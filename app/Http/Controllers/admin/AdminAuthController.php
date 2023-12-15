<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
  public function index()
  {
    if (Auth::guard('admin')->check()) {
      return redirect()->route('admin.dashboard.index');
    }
    return view('admin.login');
  }

  public function procesLogin(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'username' => ['required'],
      'password' => ['required'],
    ], [
      'username.required' => 'isi username anda!',
      'password.required' => 'isi password anda!',
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

    $credentials = $request->only('username', 'password');

    // Login berhasil
    if (Auth::guard('admin')->attempt($credentials)) {
      toastr()
        ->newestOnTop(true)
        ->addSuccess('Selamat datang, ' . Auth::guard('admin')->user()->nama . '!');
      return redirect()->route('admin.dashboard.index');
    }

    // Login gagal
    toastr()
      ->newestOnTop(true)
      ->addError('Username atau password salah!');
    return redirect()->back()->withErrors([
      'error' => 'username atau password salah',
    ])->withInput();
  }

  public function logout()
  {
    Auth::guard('admin')->logout(); // Logout pengguna dari guard 'admin'
    toastr()
      ->newestOnTop(true)
      ->addSuccess('Berhasil logout...');
    return redirect()->route('admin.login.view'); // Mengarahkan ke halaman login
  }
}
