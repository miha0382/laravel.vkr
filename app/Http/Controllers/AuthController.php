<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"]
        ]);

        if(auth('web')->attempt($data))
        {
            return redirect(route('home'));
        }
        else return redirect()
        ->route('home')
        ->withErrors(["email" => "Неправильный email или пароль!"]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email", "string", "unique:users,email"],
            "password" => ["required", "confirmed"]
        ]);

        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"])
        ]);

        if($user)
        {
            auth('web')->login($user);
            return redirect(route('home'));
        }
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect(route('home'));
    }
}
