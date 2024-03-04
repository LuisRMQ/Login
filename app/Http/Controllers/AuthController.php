<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
       
        // return false;
        // Validación de campos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'g-recaptcha-response' => ['required', new \App\Rules\Recaptcha]
        ]);

        // Comprobar si es el primer usuario registrado
        $isAdmin = User::count() === 0;

        // Crear usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $isAdmin ? 1 : 0,
        ]);

        // Puedes redirigir a donde quieras después de registrar al usuario
        return redirect('/welcome')->with('success', '¡Registro exitoso!');
    }


}
