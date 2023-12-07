<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
  public function handle($request, Closure $next, ...$roles)
  {
    $user = Auth::guard('admin')->user();

    if (!$user) {
      toastr()
        ->newestOnTop(true)
        ->addError('Silahkan login terlebih dahulu!');
      return redirect()->route('admin.login.view'); // Redirect ke halaman login jika tidak terautentikasi
    }

    // Cek apakah peran pengguna sesuai dengan yang diizinkan
    if (in_array($user->role, $roles)) {
      return $next($request);
    }

    // Redirect ke halaman yang sesuai jika peran tidak diizinkan
    toastr()
      ->newestOnTop(true)
      ->addWarning('Role tidak diizinkan!');
    return redirect()->back();
  }
}
