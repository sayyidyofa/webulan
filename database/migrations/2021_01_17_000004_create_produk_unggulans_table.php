<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukUnggulansTable extends Migration
{
    public function up()
    {
        Schema::create('produk_unggulans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });
    }
}
