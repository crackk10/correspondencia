<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_Salida');
            $table->unsignedBigInteger('id_area');
            $table->foreign('id_area','fk_salidadaArea_areas')->references('id')->on('areas')->onDelete('restrict')->onUpdate('restrict'); 
            $table->string('destinatario');
            $table->unsignedBigInteger('id_documento');
            $table->foreign('id_documento','fk_salidaDocumento_documento')->references('id')->on('documentos')->onDelete('restrict')->onUpdate('restrict');       
            $table->string('asunto');
            $table->string('adjunto');
            $table->char('requiere_respuesta',2)->default('No');
            $table->char('es_respuesta',2)->default('No');
            $table->string('observaciones');
            $table->date('fecha_salida');
            $table->date('fecha_limite');
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
        Schema::dropIfExists('salidas');
    }
}
