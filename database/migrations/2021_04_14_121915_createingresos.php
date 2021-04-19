<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createingresos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TotalIngresos', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha');
            $table->float('valor', 6, 2);

            
            $table->string('Observaciones')->nullable();
            $table->char('Ruta')->nullable();
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
        //
    }
}
