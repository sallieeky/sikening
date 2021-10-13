<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            "password" => bcrypt("admin123"),
            "email_verified_at" => date("Y-m-d h:i:s")
        ]);
        User::create([
            "nama" => "User Sikening",
            "email" => "user@gmail.com",
            "password" => bcrypt("user12345"),
            "email_verified_at" => date("Y-m-d h:i:s")
        ]);
    }
}