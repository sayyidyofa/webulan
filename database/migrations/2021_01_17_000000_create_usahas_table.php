<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsahasTable extends Migration
{
    public function up()
    {
        Schema::create('usahas', function (Blueprint $table) {
            $table->id();
            $table->string('nib');
            $table->string('nama');
            $table->string('brand');
            $table->string('deskripsi');
            $table->string('kategori');
            $table->string('kontak');
            $table->string('alamat_maps');
            $table->string('kegiatan')->nullable();
            $table->timestamps();
        });
    }
}
