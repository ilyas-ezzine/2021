<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominas', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha');
            $table->float('valor', 6, 2);
            $table->float('retenciones',6,2);
            $table->string('Observaciones')->nullable();
            $table->char('ruta')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('empleado_id');
            
            $table->foreign('empleado_id')
                  ->references('id')->on('empleados')
                  ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nominas');
    }
}
