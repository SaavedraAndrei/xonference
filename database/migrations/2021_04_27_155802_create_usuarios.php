<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('apellidoPaterno', 75);
            $table->string('apellidoMaterno', 75);
            $table->string('email', 150);
            $table->decimal('totalPago', $precision = 8, $scale = 2)->nullable();
            $table->boolean('pagado');
            $table->integer('id_asistencia');
            $table->integer('id_conferencia');
            $table->datetime('fecha_creacion');
            $table->integer('usuario_creacion');
            $table->datetime('fecha_actualizacion');
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
        Schema::dropIfExists('usuarios');
    }
}
