<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->boolean('isActiveMax');
            $table->integer('maxDiscount', false, true)->nullable();
            $table->boolean('isActiveCur');
            $table->integer('curDiscount', false, true)->nullable();
            $table->boolean('isActiveSpec');
            $table->integer('specDiscount', false, true)->nullable();
            $table->boolean('isActiveFree');
            $table->integer('freeService', false, true)->nullable();
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
        Schema::dropIfExists('options');
    }
}
