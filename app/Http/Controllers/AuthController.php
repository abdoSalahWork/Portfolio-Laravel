<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('aPanel.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // dd($request->email);
        $isLogIn = auth()->attempt(['email' => $data['email'], 'password' => $data['password']]);

        return redirect(url('/admin'));
    }
    public function logOut()
    {
        auth()->logOut();

        return redirect(url('/admin/login/page'));
    }
}
