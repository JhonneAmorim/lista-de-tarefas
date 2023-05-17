<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
        }

        $name = $request->input('name');
        $password = $request->input('password');

        $remember_me = false;
        Session::start();
        if (Auth::attempt(['name' => $name, 'password' => $password], $remember_me)) {
            return redirect()->intended('/');
        } else {
            return back()->with('error', 'Usuário ou senha inválidos');
        }
    }

    public function logout()
    {
        Auth::logout();

        Session::flush();

        Session::regenerate();

        return redirect()->route('login');
    }
}
