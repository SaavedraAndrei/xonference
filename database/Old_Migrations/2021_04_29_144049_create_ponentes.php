<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePonentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('ponentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidoPaterno', 75);
            $table->string('apellidoMaterno', 75);
            $table->string('email', 150);
            $table->string('clave', 200);
            $table->integer('dni');
            $table->string('descripcion', 1000)->nullable();
            $table->integer('telefono')->nullable();
            $table->string('fotoPonente', 50)->nullable();
            $table->boolean('pagado')->nullable();
            $table->integer('usuario_creacion')->nullable();
            $table->integer('usuario_actualizacion')->nullable();
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
        Schema::dropIfExists('ponentes');
    }
}
