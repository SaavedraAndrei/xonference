<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('conferencias', function (Blueprint $table) {
            $table->id();
            $table->string ('nombre',100);
            $table->string ('tematica',100);
            $table->string ('descripcion',100);
            $table->dateTime('fecha_conferencia');
            $table->integer('usuario_creacion');
            $table->integer('usuario_actualizacion');
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
        Schema::dropIfExists('conferencias');
    }
}
