<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthControllers extends Controller
{
    public function login()
    {
        return view("authenticate.login");
    }
    public function loginPost(Request $request)
    {
        $credential = $request->validate(
            [
                "email" => ["required", "email:dns"],
                "password" => ["required", "min:8"]
            ],
            [
                "email.required" => "Email tidak boleh kosong",
                "email.email" => "Gunakan email yang terdaftar pada google",
                "password.required" => "Password tidak boleh kosong",
                "password.min" => "Panjang password minimal 8"
            ]
        );

        if (Auth::attempt($credential)) {
            return redirect("/dashboard");
        } else {
            return back()->with("pesan", "Username atau password salah");
        }
    }

    public function registration()
    {
        return view("authenticate.registration");
    }
    public function registrationPost(Request $request)
    {
        $request->validate(
            [
                "nama" => ["required"],
                "email" => ["required", "email:dns", "unique:users"],
                "password" => ["required", "min:8"]
            ],
            [
                "nama.required" => "Nama tidak boleh kosong",
                "email.required" => "Email tidak boleh kosong",
                "email.email" => "Gunakan email yang terdaftar pada Google",
                "email.unique" => "Email yang anda masukkan telah digunakan",
                "password.required" => "Password tidak boleh kosong",
                "password.min" => "Panjang password minimal 8"
            ]
        );

        $user = User::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "remember_token" => Str::random(60)
        ]);
        event(new Registered($user));
        Auth::login($user);

        return redirect("/email/verify");
    }
}
