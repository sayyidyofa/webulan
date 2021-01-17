<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMediaSosialsTable extends Migration
{
    public function up()
    {
        Schema::table('media_sosials', function (Blueprint $table) {
            $table->unsignedBigInteger('usaha_id');
            $table->foreign('usaha_id', 'usaha_fk_2999166')->references('id')->on('usahas');
        });
    }
}
