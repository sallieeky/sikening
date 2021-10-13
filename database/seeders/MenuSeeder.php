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
            "slug" => "bolu-gulung",
            "harga" => "3000",
            "kategori" => "Kue Basah",
            "stok" => "12"
        ]);
        Menu::create([
            "gambar" => "gabin_fla.jpg",
            "nama" => "Gabin Fla",
            "slug" => "gabin-fla",
            "harga" => "2500",
            "kategori" => "Kue Kering",
            "stok" => "21"
        ]);
        Menu::create([
            "gambar" => "kue_nampan.jpg",
            "nama" => "Paket Kue Nampan",
            "slug" => "paket-kue-nampan",
            "harga" => "25000",
            "kategori" => "Paket Nampan",
            "stok" => "3"
        ]);
        Menu::create([
            "gambar" => "lapis_surabaya.jpg",
            "nama" => "Kue Lapis Surabaya",
            "slug" => "kue-lapis-surabaya",
            "harga" => "5000",
            "kategori" => "Kue Basah",
            "stok" => "10",
            "count" => "19"
        ]);
        Menu::create([
            "gambar" => "martabak_mini.jpeg",
            "nama" => "Martabak Mini",
            "slug" => "martabak-mini",
            "harga" => "3000",
            "kategori" => "Gorengan",
            "stok" => "18",
            "count" => "12"
        ]);
        Menu::create([
            "gambar" => "pie_buah.png",
            "nama" => "Pie Buah",
            "slug" => "pie-buah",
            "harga" => "2500",
            "kategori" => "Kue Basah",
            "stok" => "6"
        ]);
        Menu::create([
            "gambar" => "risoles.jpg",
            "nama" => "Risoles",
            "slug" => "risoles",
            "harga" => "2000",
            "kategori" => "Gorengan",
            "stok" => "24",
            "count" => "20"
        ]);
        Menu::create([
            "gambar" => "roti_goreng.jpg",
            "nama" => "Roti Goreng",
            "slug" => "roti-goreng",
            "harga" => "4000",
            "kategori" => "Gorengan",
            "stok" => "12"
        ]);
        Menu::create([
            "gambar" => "sosis_solo.jpg",
            "nama" => "Sosis Solo",
            "slug" => "sosis-solo",
            "harga" => "6000",
            "kategori" => "Gorengan",
            "stok" => "30",
            "count" => "12"
        ]);
        Menu::create([
            "gambar" => "sus_vla_vanila.jpg",
            "nama" => "Kue Sus Vla Vanila",
            "slug" => "kue-sus-vla-vanila",
            "harga" => "5000",
            "kategori" => "Kue Basah",
            "stok" => "16"
        ]);
        Menu::create([
            "gambar" => "tahu_pantasi.jpg",
            "nama" => "Tahu Pantasi",
            "slug" => "tahu-pantasi",
            "harga" => "3000",
            "kategori" => "Gorengan",
            "stok" => "16"
        ]);
    }
}
