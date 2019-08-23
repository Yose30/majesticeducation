<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivoSeccioneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivo_seccione', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('archivo_id');
            $table->foreign('archivo_id')->references('id')->on('archivos');
            $table->unsignedBigInteger('seccione_id');
            $table->foreign('seccione_id')->references('id')->on('secciones')->onDelete('cascade');
            $table->string('titulo', 100);
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
        Schema::dropIfExists('archivo_seccione');
    }
}
