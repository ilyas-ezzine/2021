<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Otrosgastos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otrogastos', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha');
            $table->float('Valor', 6, 2);
            $table->char('NIF',10);
            
            $table->string('Concepto')->nullable();
            $table->char('Ruta')->nullable();
            $table->timestamps();
            
            $table->foreign('NIF')
                  ->references('NIF')
                  ->on('empresas')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
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
