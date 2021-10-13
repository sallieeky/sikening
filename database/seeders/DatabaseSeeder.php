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

        Statistik::create([
            "nama" => "kunjungan",
            "value" => 0
        ]);

        Profile::create([
            "nama" => "deskripsi",
            "value" => "Cake Nining adalah toko yang menyediakan berbagai jenis kue seperti kue kering dan kue basah dengan rasa yang nikmat tanpa pengawet dan harga terjangkau. Cake Nining dikelola oleh owner (pemilik) dan beberapa karyawannya dengan segala aktivitasnya seperti mencari bahan produksi, memasarkan produk, penjualan, hingga melakukan manajemen keuangan secara manual."
        ]);
    }
}
