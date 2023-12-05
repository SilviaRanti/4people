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
      return redirect()->route('admin.dashboard');
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
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $credentials = $request->only('username', 'password');

    // Login berhasil
    if (Auth::guard('admin')->attempt($credentials)) {
      return redirect()->route('admin.dashboard'); // Mengarahkan ke halaman dashboard
    }

    // Login gagal
    return redirect()->back()->withErrors([
      'error' => 'username atau password salah',
    ])->withInput();
  }

  public function logout()
  {
    Auth::guard('admin')->logout(); // Logout pengguna dari guard 'admin'
    return redirect()->route('admin.login.view'); // Mengarahkan ke halaman login
  }
}
