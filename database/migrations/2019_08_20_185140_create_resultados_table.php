<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->unsignedBigInteger('evaluacione_id');
            $table->foreign('evaluacione_id')->references('id')->on('evaluaciones');
            $table->double('calificacion', 5, 3);
            $table->timestamps();
        });

        // TABLA PENDIENTE
        // Schema::create('valores', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->unsignedBigInteger('resultado_id');
        //     $table->foreign('resultado_id')->references('id')->on('resultados');
        //     $table->unsignedBigInteger('pregunta_id');
        //     $table->foreign('pregunta_id')->references('id')->on('preguntas');
        //     $table->enum('valor', ['Correcto', 'Incorrecto']);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados');
    }
}
