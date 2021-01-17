<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsahasTable extends Migration
{
    public function up()
    {
        Schema::table('usahas', function (Blueprint $table) {
            $table->unsignedBigInteger('pengusaha_id');
            $table->foreign('pengusaha_id', 'pengusaha_fk_2999081')->references('id')->on('pengusahas');
        });
    }
}
