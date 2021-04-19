<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasgastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturasgastos', function (Blueprint $table) {
            $table->id();
            $table->char('NIF',10);
            $table->float('valor', 8, 2);
            $table->float('IVA',4,2);
            $table->date('fecha');
            $table->char('descripcion');
            $table->char('Ruta');
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
        Schema::dropIfExists('facturasgastos');
    }
}
