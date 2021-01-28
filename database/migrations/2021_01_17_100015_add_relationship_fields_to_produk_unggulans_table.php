<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProdukUnggulansTable extends Migration
{
    public function up()
    {
        Schema::table('produk_unggulans', function (Blueprint $table) {
            $table->unsignedBigInteger('usaha_id');
            $table->foreign('usaha_id', 'usaha_fk_2999177')->references('id')->on('usahas')->onUpdate('cascade')->onDelete('cascade');
        });
    }
}
