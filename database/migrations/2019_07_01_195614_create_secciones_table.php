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
        Schema::create('secciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('clase_id');
            $table->foreign('clase_id')->references('id')->on('clases');
            $table->string('seccion');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('categoria');
            $table->timestamps();
        });

        Schema::create('documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('seccione_id');
            $table->foreign('seccione_id')->references('id')->on('secciones');
            $table->string('titulo', 100);
            $table->string('public_url', 100)->unique();
            $table->integer('size');
            $table->string('extension');
            // $table->unsignedInteger('categoria_id')->nullable();
            // $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->timestamps();
        });

        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('seccione_id');
            $table->foreign('seccione_id')->references('id')->on('secciones');
            $table->string('titulo', 100);
            $table->string('url', 100);
            // $table->text('descripcion')->nullable();
            $table->timestamps();
        });

        Schema::create('links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('seccione_id');
            $table->foreign('seccione_id')->references('id')->on('secciones');
            $table->string('titulo', 100);
            $table->string('url', 100);
            $table->timestamps();
        });

        Schema::create('audios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('seccione_id');
            $table->foreign('seccione_id')->references('id')->on('secciones');
            $table->string('titulo', 100);
            $table->string('public_url', 100)->unique();
            $table->integer('size');
            $table->string('extension');
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
        Schema::dropIfExists('secciones');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('documentos');
        Schema::dropIfExists('videos');
        Schema::dropIfExists('links');
        Schema::dropIfExists('audios');
    }
}
