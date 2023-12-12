<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $data = [
      'categories' => Category::all()
    ];
    return view('admin.categories.index', $data);
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
    // Validasi data input
    $validator = Validator::make($request->all(), [
      'nama' => 'required|string|max:255',
      'deskripsi' => 'required|string',
    ]);

    // Cek jika validasi gagal
    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput();
    }

    // Proses penyimpanan data ke database
    try {
      Category::create([
        'nama' => $request->input('nama'),
        'deskripsi' => $request->input('deskripsi'),
      ]);

      // Redirect dengan pesan sukses
      return redirect()->route('admin.categories.index')
        ->with('success', 'Kategori berhasil ditambahkan.');
    } catch (\Exception $e) {
      // Redirect dengan pesan error
      return back()->withErrors('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
    // Validasi input
    $validator = Validator::make($request->all(), [
      'nama' => 'required|string|max:255',
      'deskripsi' => 'nullable|string',
    ]);

    if ($validator->fails()) {
      toastr()->newestOnTop(true)->addError($validator->errors()->first());
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      // Mencari kategori berdasarkan ID dan update data
      $category = Category::findOrFail($id);
      $category->update([
        'nama' => $request->input('nama'),
        'deskripsi' => $request->input('deskripsi'),
      ]);

      toastr()->newestOnTop(true)->addSuccess('Berhasil ubah data kategori');
      return redirect()->back(); // Sesuaikan dengan route yang Anda miliki
    } catch (\Exception $e) {
      toastr()->newestOnTop(true)->addError('Gagal ubah data kategori');
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
      // Mencari kategori berdasarkan ID dan hapus
      $category = Category::findOrFail($id);
      $category->delete();

      toastr()->newestOnTop(true)->addSuccess('Berhasil menghapus kategori');
      return redirect()->back(); // Sesuaikan dengan route yang Anda miliki
    } catch (\Exception $e) {
      toastr()->newestOnTop(true)->addError('Gagal menghapus kategori');
      return redirect()->back();
    }
  }
}
