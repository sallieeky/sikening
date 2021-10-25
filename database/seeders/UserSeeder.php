<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nama" => "Admin",
            "role" => "admin",
            "foto" => "logo.png",
            "email" => "sikening.a6@gmail.com",
            "no_telp" => "082113643151",
            "password" => bcrypt("admin123"),
            "email_verified_at" => date("Y-m-d h:i:s"),
            "remember_token" => Str::random(60),
            "status" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit nisi beatae reprehenderit, deserunt soluta error ut ex! Ullam, exercitationem architecto dignissimos voluptate harum incidunt? Voluptatem.",
            "alamat" => "Jl. Ahmad Yani, Gg. Selat Timor",
            "kota" => "Bontang",
            "provinsi" => "Kalimantan Timur",
            "kode_pos" => "75321"
        ]);
        User::create([
            "nama" => "User Sikening",
            "email" => "user@gmail.com",
            "no_telp" => "081243942304",
            "password" => bcrypt("user12345"),
            "email_verified_at" => date("Y-m-d h:i:s"),
            "remember_token" => Str::random(60),
            "status" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit nisi beatae reprehenderit, deserunt soluta error ut ex! Ullam",
            "alamat" => "Jl. KS. Tubun",
            "kota" => "Balikpapan",
            "provinsi" => "Kalimantan Timur",
            "kode_pos" => "75123"
        ]);
    }
}
