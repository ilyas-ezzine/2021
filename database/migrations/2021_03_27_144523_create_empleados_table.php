<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->char('Nombre',20);
            $table->char('Apellidos',45);
            $table->date('FechaNac');
            $table->char('NIF',9)->unique();
            $table->date('FechaAlta')->nullable();
            $table->date('FechaBaja')->nullable();
            $table->char('NSS',12);
            $table->char('ruta')->nullable();
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
        Schema::dropIfExists('empleados');
    }
}
