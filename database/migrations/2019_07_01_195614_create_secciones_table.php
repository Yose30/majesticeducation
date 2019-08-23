<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('profesore_id');
            $table->foreign('profesore_id')->references('id')->on('profesores');
            $table->string('titulo');
            $table->timestamps();
        });

        Schema::create('secciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('clase_id');
            $table->foreign('clase_id')->references('id')->on('clases');
            $table->unsignedBigInteger('evaluacione_id')->nullable();
            $table->foreign('evaluacione_id')->references('id')->on('evaluaciones');
            $table->string('seccion');
            $table->string('slug');
            $table->timestamps();
        });
        
        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('categoria');
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
        Schema::dropIfExists('evaluaciones');
        Schema::dropIfExists('secciones');
        Schema::dropIfExists('categorias');
    }
}
