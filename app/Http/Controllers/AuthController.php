<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }

    public function store()
    {
        $validated = request()->validate([
            "name" => "required|min:3|max:40",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed",
        ]);

        $user = User::create([
            "name"=> $validated["name"],
            "email"=> $validated["email"],
            "password"=> $validated["password"],
        ]);

        Mail::to($user->email)
        ->send(new WelcomeEmail($user));

        return redirect()->route("dashboard")->with("success","Usuário criado com sucesso!");
    }

    public function login()
    {
        return view("auth.login");
    }

    public function authenticate()
    {
        $validated = request()->validate([
            "email" => "required|email",
            "password" => "required|min:8",
        ]);

        if(Auth::attempt($validated)){

            request()->session()->regenerate();

            return redirect()->route("dashboard")->with("success","Bem vindo!");
        }

        return redirect()->route("login")->withErrors([
            "email" => "Email e/ou senha inválidos"
        ]);
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route("dashboard");
    }
}
