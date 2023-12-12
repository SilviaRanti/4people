<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminServiceController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $data = [
      'services' => Services::with('category')->get(),
      'categories' => Category::all()
    ];
    return view('admin.services.index', $data);
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
      'nama' => 'required|string|max:255',
      'harga' => 'required|numeric',
      'kategori' => 'required|exists:categories,id', // Ensure the category exists
      'deskripsi' => 'required|string',
    ]);

    if ($validator->fails()) {
      toastr()->newestOnTop(true)->addError($validator->errors()->first());
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      // Menggunakan model Service untuk menyimpan data
      Services::create([
        'nama' => $request->input('nama'),
        'harga' => $request->input('harga'),
        'category_id' => $request->input('kategori'),
        'deskripsi' => $request->input('deskripsi'),
      ]);

      toastr()->newestOnTop(true)->addSuccess('Berhasil tambah data');
      return redirect()->back();
    } catch (\Throwable $th) {
      toastr()->newestOnTop(true)->addError('Gagal tambah data: ' . $th->getMessage());
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
      'nama' => 'required|string|max:255',
      'harga' => 'required|numeric',
      'kategori' => 'required|exists:categories,id',
      'deskripsi' => 'required|string',
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      foreach ($errors as $error) {
        toastr()->newestOnTop(true)->addError($error);
      }
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      $service = Services::findOrFail($id);
      $service->nama = $request->input('nama');
      $service->harga = $request->input('harga');
      $service->category_id = $request->input('kategori');
      $service->deskripsi = $request->input('deskripsi');

      $service->save();

      toastr()->newestOnTop(true)->addSuccess('Berhasil ubah data');
      return redirect()->back();
    } catch (\Throwable $th) {
      toastr()->newestOnTop(true)->addError('Gagal mengubah data: ' . $th->getMessage());
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
      $service = Services::findOrFail($id);
      $service->delete();

      toastr()->newestOnTop(true)->addSuccess('Berhasil menghapus data!');
      return redirect()->back();
    } catch (\Throwable $th) {
      toastr()->newestOnTop(true)->addError('Gagal menghapus data: ' . $th->getMessage());
      return redirect()->back();
    }
  }
}
