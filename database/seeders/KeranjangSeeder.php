<?php

namespace Database\Seeders;

use App\Models\Keranjang;
use Illuminate\Database\Seeder;

class KeranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keranjang::create([
            "kode_keranjang" => "k_2_10101",
            "user_id" => 2,
            "menu_id" => 2,
            "jumlah" => 3,
        ]);
        Keranjang::create([
            "kode_keranjang" => "k_2_10101",
            "user_id" => 2,
            "menu_id" => 3,
            "jumlah" => 4,
        ]);
    }
}
