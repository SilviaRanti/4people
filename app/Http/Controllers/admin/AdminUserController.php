<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $data = [
      'users' => Admin::all()
    ];
    return view('admin.user.index', $data);
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
      'username' => [
        'required',
        'string',
        'max:255',
        Rule::unique('admins')->ignore($request->user_id),
      ],
      'password' => 'required|string|min:6',
      'role' => 'required|in:1,2',
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      foreach ($errors as $error) {
        toastr()->newestOnTop(true)->addError($error);
      }
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      Admin::create([
        'nama' => $request->input('nama'),
        'username' => $request->input('username'),
        'password' => Hash::make($request->input('password')),
        'role' => $request->input('role'),
      ]);

      toastr()->newestOnTop(true)->addSuccess('Berhasil tambah data');
      return redirect()->back();
    } catch (\Throwable $th) {
      toastr()->newestOnTop(true)->addError('Gagal tambah data!');
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
      'username' => [
        'required',
        'string',
        'max:255',
        Rule::unique('admins')->ignore($id),
      ],
      'password' => 'nullable|string|min:6', // Allow the password to be nullable
      'role' => 'required|in:1,2',
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      foreach ($errors as $error) {
        toastr()->newestOnTop(true)->addError($error);
      }
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      $admin = Admin::findOrFail($id);
      $admin->nama = $request->input('nama');
      $admin->username = $request->input('username');
      $admin->role = $request->input('role');

      // Update the password only if a new password is provided
      if ($request->filled('password')) {
        $admin->password = Hash::make($request->input('password'));
      }

      $admin->save();

      toastr()->newestOnTop(true)->addSuccess('Berhasil ubah data');
      return redirect()->back();
    } catch (\Throwable $th) {
      toastr()->newestOnTop(true)->addError('Data user gagal diubah');
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
      $admin = Admin::findOrFail($id);
      $admin->delete();

      toastr()->newestOnTop(true)->addSuccess('Berhasil menghapus data!');
      return redirect()->back();
    } catch (\Throwable $th) {
      toastr()->newestOnTop(true)->addError('Gagal menghapus data!');
      return redirect()->back();
    }
  }
}
