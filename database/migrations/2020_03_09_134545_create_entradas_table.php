<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('codigo_entrada')->nullable($value='true')->default('Sin Codigo');
            $table->string('codigo_Salida');
            $table->unsignedBigInteger('id_area');
            $table->foreign('id_area','fk_entradaArea_areas')->references('id')->on('areas')->onDelete('restrict')->onUpdate('restrict'); 
            $table->string('remitente');
            $table->unsignedBigInteger('id_documento');
            $table->foreign('id_documento','fk_entradaDocumento_documento')->references('id')->on('documentos')->onDelete('restrict')->onUpdate('restrict');       
            $table->string('asunto');
            $table->string('adjunto');
            $table->char('requiere_respuesta',2)->nullable($value='true')->default('No');
            $table->char('es_respuesta',2)->nullable($value='true')->default('No');
            $table->string('observaciones');
            $table->date('fecha_entrada');
            $table->date('fecha_limite');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
