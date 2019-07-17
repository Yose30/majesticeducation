<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnlaceSeccioneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enlace_seccione', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('enlace_id');
            $table->foreign('enlace_id')->references('id')->on('enlaces');
            $table->unsignedBigInteger('seccione_id');
            $table->foreign('seccione_id')->references('id')->on('secciones')->onDelete('cascade');
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
        Schema::dropIfExists('enlace_seccione');
    }
}
