<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaSosialsTable extends Migration
{
    public function up()
    {
        Schema::create('media_sosials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('link_accname');
            $table->string('vendor');
            $table->timestamps();
        });
    }
}
