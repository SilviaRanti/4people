<?php


namespace App\Http\Controllers\Admin;

use App\Models\Hero;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminHeroController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $data = [
      'heros' => Hero::all()
    ];
    return view('admin.hero.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'judul' => 'required|string|max:255',
      'deskripsi' => 'required|string|max:255',
      'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
    ], [
      'gambar.required' => 'Gambar wajib diunggah.',
      'gambar.image' => 'File harus berupa gambar.',
      'gambar.mimes' => 'Format gambar tidak sesuai. Pilih format jpeg, png, jpg, atau webp.',
      'gambar.max' => 'Ukuran gambar tidak boleh melebihi 2 MB.',
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      foreach ($errors as $error) {
        toastr()
          ->newestOnTop(true)
          ->addError($error);
      }
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      $gambar = $request->file('gambar');
      $waktu = now();
      $randomString = Str::random(10); // Ganti 10 dengan panjang string yang diinginkan
      $gambarName = $randomString . '_' . $waktu->toDateString() . '_' . $gambar->getClientOriginalName();
      $gambar->move(public_path('user/images/background/'), $gambarName);

      // Sesuaikan properti dan model sesuai kebutuhan Anda
      Hero::create([
        'judul' => $request->input('judul'),
        'deskripsi' => $request->input('deskripsi'),
        'gambar' => $gambarName,
      ]);

      toastr()
        ->newestOnTop(true)
        ->addSuccess('Berhasil tambah data');
      return redirect()->route('admin.hero.index');
    } catch (\Throwable $th) {
      throw $th;
      toastr()
        ->newestOnTop(true)
        ->addError('Gagal tambah data!');
      return redirect()->route('admin.hero.index');
    }
  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(), [
      'judul' => 'required|string|max:255',
      'deskripsi' => 'required|string|max:255',
      'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ], [
      'gambar.image' => 'File harus berupa gambar.',
      'gambar.mimes' => 'Format gambar tidak sesuai. Pilih format jpeg, png, jpg, atau webp.',
      'gambar.max' => 'Ukuran gambar tidak boleh melebihi 2 MB.',
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      foreach ($errors as $error) {
        toastr()
          ->newestOnTop(true)
          ->addError($error);
      }
      return redirect()->back();
    }

    try {
      $hero = Hero::findOrFail($id);
      $hero->judul = $request->input('judul');
      $hero->deskripsi = $request->input('deskripsi');

      if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada gambar baru yang diunggah
        $gambarLama = public_path('user/images/background/' . $hero->gambar);
        if (file_exists($gambarLama)) {
          unlink($gambarLama);
        }

        // Upload dan simpan gambar baru
        $gambar = $request->file('gambar');
        $waktu = Carbon::now();
        $randomString = Str::random(10);
        $gambarName = $randomString . '_' . $waktu->toDateString() . '_' . $gambar->getClientOriginalName();
        $gambar->move(public_path('user/images/background/'), $gambarName);
        $hero->gambar = $gambarName;
      }

      $hero->save();

      toastr()
        ->newestOnTop(true)
        ->addSuccess('Berhasil ubah data');
      return redirect()->route('admin.hero.index');
    } catch (\Throwable $th) {
      toastr()
        ->newestOnTop(true)
        ->addSuccess('Data hero gagal diubah');
      return redirect()->route('admin.hero.index');
    }
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $hero = Hero::findOrFail($id);
      if ($hero->gambar) {
        $gambarLama = public_path('user/images/background/' . $hero->gambar);
        if (file_exists($gambarLama)) {
          unlink($gambarLama);
        }
      }
      $hero->delete();

      toastr()
        ->newestOnTop(true)
        ->addSuccess('Berhasil dihapus');
      return redirect()->route('admin.hero.index');
    } catch (\Throwable $th) {
      toastr()
        ->newestOnTop(true)
        ->addSuccess('Data hero gagal dihapus');
      return redirect()->route('admin.hero.index');
    }
  }
}
