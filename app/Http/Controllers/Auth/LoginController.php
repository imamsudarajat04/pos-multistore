<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function todoLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ],
        [
            'email.required'    => 'Email Wajib Diisi',
            'email.email'       => 'Email Tidak Valid',
            'password.required' => 'Password Wajib Diisi'
        ]);

        // return redirect()->route('dashboard');
    }
}
