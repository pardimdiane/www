<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagasTable extends Migration
{
    /** * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->unsignedBigInteger('situacao_id');
            $table->foreign('situacao_id')->references('id')->on('situacoes')->onDelete('cascade');
            $table->unsignedBigInteger('tipoVaga_id');
            $table->foreign('tipoVaga_id')->references('id')->on('tipoVagas')->onDelete('cascade');
            $table->string('nome');
            $table->text('descricao');
            $table->string('requisitos');
            $table->float('salario');
            $table->string('contatoVaga');
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
        Schema::dropIfExists('vagas');
    }
}
