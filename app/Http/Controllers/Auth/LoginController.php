<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard'; // Mengarahkan ke halaman home setelah login

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // if ($user->is_admin) {
        //     return redirect('/admin/dashboard'); // Ganti dengan URL tujuan untuk admin
        // } else {
        return redirect()->route('home'); // Ganti dengan URL tujuan untuk pengguna biasa

    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/login'); // Ganti dengan URL tujuan setelah logout
    }
}