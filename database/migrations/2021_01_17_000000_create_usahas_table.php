<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsahasTable extends Migration
{
    public function up()
    {
        Schema::create('usahas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nib');
            $table->string('brand');
            $table->string('deskripsi');
            $table->string('kategori');
            $table->string('kontak');
            $table->string('alamat');
            $table->string('maps', 8192)->nullable(); // https://www.google.com/search?q=google+maps+url+length
            $table->string('kegiatan')->nullable();
            $table->timestamps();
        });
    }
}
