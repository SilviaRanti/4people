<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminSettingsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.settings.index');
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
    // Mendapatkan data admin yang sedang login
    $admin = Auth::guard('admin')->user();

    $validator = Validator::make($request->all(), [
      'nama' => 'required|string|max:255',
      'username' => [
        'required',
        'string',
        'max:255',
        Rule::unique('admins')->ignore($admin->id),
      ],
      'password' => 'required|string|min:6',
      'password_baru' => 'nullable|string|min:6',
    ], [
      'password.required' => 'Password tidak boleh kosong!.'
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      foreach ($errors as $error) {
        toastr()->newestOnTop(true)->addError($error);
      }
      return redirect()->back()->withErrors($validator)->withInput();
    }


    try {
      if (Hash::check($request->input('password'), $admin->password)) {
        // Jika password lama cocok, lakukan pembaruan data
        $admin->nama = $request->input('nama');
        $admin->username = $request->input('username');

        // Pembaruan password baru, jika disediakan
        if ($request->filled('password_baru')) {
          $admin->password = Hash::make($request->input('password_baru'));
        }

        $admin->save();

        toastr()->newestOnTop(true)->addSuccess('Berhasil update data');
      } else {
        toastr()->newestOnTop(true)->addError('Password salah.');
      }
      return redirect()->back();
    } catch (\Throwable $th) {
      toastr()->newestOnTop(true)->addError('Gagal update data: ' . $th->getMessage());
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
