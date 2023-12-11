<?php


namespace App\Http\Controllers\Admin;

use App\Models\Hero;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\LatestWork;
use Illuminate\Http\Request; // Import the correct Request class
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminLatestWorkController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $data = [
      'latestWork' => LatestWork::all()
    ];
    return view('admin.latest-work.index', $data);
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
      'urutan' => 'required|integer',
      'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
    ], [
      'urutan.required' => 'Urutan wajib diisi.',
      'urutan.integer' => 'Urutan harus berupa angka.',
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

      // Sesuaikan properti dan model sesuai kebutuhan Anda
      LatestWork::create([
        'urutan' => $request->input('urutan'),
        'gambar' => $gambarName,
      ]);
      $gambar->move(public_path('user/images/last-wrok/'), $gambarName);

      toastr()
        ->newestOnTop(true)
        ->addSuccess('Berhasil tambah data');
      return redirect()->back();
    } catch (\Throwable $th) {
      throw $th;
      toastr()
        ->newestOnTop(true)
        ->addError('Gagal tambah data!');
      return redirect()->back();
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
      'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ], [
      'gambar.image' => 'File harus berupa gambar.',
      'gambar.mimes' => 'Format gambar tidak sesuai. Pilih format jpeg, png, jpg, atau webp.',
      'gambar.max' => 'Ukuran gambar tidak boleh melebihi 2 MB.',
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      foreach ($errors as $error) {
        toastr()->newestOnTop(true)->addError($error);
      }
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      $latestWork = LatestWork::findOrFail($id);

      if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        $gambarLama = public_path('user/images/last-wrok/' . $latestWork->gambar);
        if (file_exists($gambarLama)) {
          unlink($gambarLama);
        }

        // Upload dan simpan gambar baru
        $gambar = $request->file('gambar');
        $waktu = Carbon::now();
        $randomString = Str::random(10);
        $gambarName = $randomString . '_' . $waktu->toDateString() . '_' . $gambar->getClientOriginalName();
        $gambar->move(public_path('user/images/last-wrok/'), $gambarName);
        $latestWork->gambar = $gambarName;
      }

      $latestWork->save();

      toastr()->newestOnTop(true)->addSuccess('Berhasil ubah data');
      return redirect()->back();
    } catch (\Throwable $th) {
      toastr()->newestOnTop(true)->addError('Data gagal diubah: ' . $th->getMessage());
      return redirect()->back();
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
        $gambarLama = public_path('user/images/last-wrok/' . $hero->gambar);
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
