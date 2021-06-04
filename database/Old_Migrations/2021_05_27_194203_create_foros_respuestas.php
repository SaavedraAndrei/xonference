<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForosRespuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('foros_respuestas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 300);
            $table->string('respuesta', 10000);
            $table->integer('dni_usuarios')->nullable();
            $table->integer('idEvento')->nullable();
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
        Schema::dropIfExists('foros_respuestas');
    }
}
