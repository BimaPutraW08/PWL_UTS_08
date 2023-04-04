<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataBarang', function (Blueprint $table) {
            $table->string('kode_barang')->primary();
            $table->string('nama_barang')->nullable();
            $table->string('kategori_barang')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('qty')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('dataBarang', function (Blueprint $table) {
            $table->string('kode_barang')->primary();
            $table->string('nama_barang')->nullable();
            $table->string('kategori_barang')->nullable();
            $table->string('harga')->nullable();
            $table->string('qty')->nullable();
        });
    }
};
