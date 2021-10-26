<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            "gambar" => "bolu_gulung.png",
            "nama" => "Bolu Gulung",
            "harga" => "3000",
            "kategori" => "Kue Basah",
            "stok" => "12"
        ]);
        Menu::create([
            "gambar" => "gabin_fla.jpg",
            "nama" => "Gabin Fla",
            "harga" => "2500",
            "kategori" => "Kue Kering",
            "stok" => "21",
            "count" => "3",
        ]);
        Menu::create([
            "gambar" => "kue_nampan.jpg",
            "nama" => "Paket Kue Nampan",
            "harga" => "25000",
            "kategori" => "Paket Nampan",
            "stok" => "3",
            "count" => "4"
        ]);
        Menu::create([
            "gambar" => "lapis_surabaya.jpg",
            "nama" => "Kue Lapis Surabaya",
            "harga" => "5000",
            "kategori" => "Kue Basah",
            "stok" => "10",
        ]);
        Menu::create([
            "gambar" => "martabak_mini.jpeg",
            "nama" => "Martabak Mini",
            "harga" => "3000",
            "kategori" => "Gorengan",
            "stok" => "18",
        ]);
        Menu::create([
            "gambar" => "pie_buah.png",
            "nama" => "Pie Buah",
            "harga" => "2500",
            "kategori" => "Kue Basah",
            "stok" => "6"
        ]);
        Menu::create([
            "gambar" => "risoles.jpg",
            "nama" => "Risoles",
            "harga" => "2000",
            "kategori" => "Gorengan",
            "stok" => "24",
        ]);
        Menu::create([
            "gambar" => "roti_goreng.jpg",
            "nama" => "Roti Goreng",
            "harga" => "4000",
            "kategori" => "Gorengan",
            "stok" => "12"
        ]);
        Menu::create([
            "gambar" => "sosis_solo.jpg",
            "nama" => "Sosis Solo",
            "harga" => "6000",
            "kategori" => "Gorengan",
            "stok" => "30",
        ]);
        Menu::create([
            "gambar" => "sus_vla_vanila.jpg",
            "nama" => "Kue Sus Vla Vanila",
            "harga" => "5000",
            "kategori" => "Kue Basah",
            "stok" => "16"
        ]);
        Menu::create([
            "gambar" => "tahu_pantasi.jpg",
            "nama" => "Tahu Pantasi",
            "harga" => "3000",
            "kategori" => "Gorengan",
            "stok" => "16"
        ]);
    }
}
