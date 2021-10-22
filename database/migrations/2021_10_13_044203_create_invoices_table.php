<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("kode_pembayaran");
            $table->string("kode_keranjang");
            $table->string("metode_pembayaran");
            $table->integer("total_pembayaran");
            $table->date("tanggal_pengambilan")->nullable();
            $table->string("bukti_pembayaran")->default("belum");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
