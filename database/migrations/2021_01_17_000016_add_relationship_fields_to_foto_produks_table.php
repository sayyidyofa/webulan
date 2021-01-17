<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFotoProduksTable extends Migration
{
    public function up()
    {
        Schema::table('foto_produks', function (Blueprint $table) {
            $table->unsignedBigInteger('produk_unggulan_id');
            $table->foreign('produk_unggulan_id', 'produk_unggulan_fk_2999241')->references('id')->on('produk_unggulans');
        });
    }
}
