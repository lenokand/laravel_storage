<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodslistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goodslists', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('character');
            $table->string('storagenumber')->index();
            $table->string('storagename')->index();
            $table->string('storageadres');
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
        Schema::dropIfExists('goodslists');
    }
}
