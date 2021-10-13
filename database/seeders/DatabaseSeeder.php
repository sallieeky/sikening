<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Statistik;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(KeranjangSeeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(ProfileSeeder::class);

        Statistik::create([
            "nama" => "kunjungan",
            "value" => 0
        ]);
    }
}
