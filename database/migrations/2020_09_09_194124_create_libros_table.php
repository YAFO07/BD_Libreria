<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_editorial')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->integer('id_idioma')->unsigned();
            $table->integer('id_autor')->unsigned();
            $table->string('nombre',50);
            $table->string('codigo')->uniqid;
            $table->integer('cantidad');
            $table->date('año_publi');
            $table->string('num_pagina',100);
            $table->string('ubicasion',20);
            $table->string('edicion',30);

            $table->foreign('id_editorial')->references('id')->on('editoriales');
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreign('id_idioma')->references('id')->on('idiomas');
            $table->foreign('id_autor')->references('id')->on('autores');
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
        Schema::dropIfExists('libros');
    }
}
