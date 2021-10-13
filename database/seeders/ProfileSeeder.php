<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            "nama" => "deskripsi",
            "value" => "Cake Nining adalah toko yang menyediakan berbagai jenis kue seperti kue kering dan kue basah dengan rasa yang nikmat tanpa pengawet dan harga terjangkau. Cake Nining dikelola oleh owner (pemilik) dan beberapa karyawannya dengan segala aktivitasnya seperti mencari bahan produksi, memasarkan produk, penjualan, hingga melakukan manajemen keuangan secara manual."
        ]);
        Profile::create([
            "nama" => "promo",
            "value" => "Promo belanja melalui SIKENING dan dapatkan gratis 1 lusin risoles",
            "tanggal_akhir" => "2021-12-13"
        ]);
        Profile::create([
            "nama" => "promo",
            "value" => "Promo diskon 50% kapan-kapan",
            "tanggal_akhir" => "2021-12-20"
        ]);
    }
}
