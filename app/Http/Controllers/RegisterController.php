<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $criarUsuario = new User();
        $criarUsuario->name = $request->input('name');
        $criarUsuario->password = Hash::make($request->input('password'));
        $criarUsuario->email = $request->input('email');
        $criarUsuario->save();

        return redirect('/')->with('success', 'Usuário criado com sucesso!');
    }
}
