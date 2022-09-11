<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data');
            $table->string('tipo');
            $table->integer('conta_id');
            $table->foreign('conta_id')->references('id')->on('contas');
           
            $table->integer('centro_id');
            $table->foreign('centro_id')->references('id')->on('centros');
           
            $table->integer('fluxo_id');
            $table->foreign('fluxo_id')->references('id')->on('fluxos');
           
            $table->integer('user_id')->nullable();
            $table->integer('titulo_id')->nullable();
            $table->string('nrdoc')->nullable();
            $table->string('descricao');
            $table->float('valor')->default(0.00);
            $table->boolean('destacar')->nullable();
            $table->string('obs')->nullable();
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
        Schema::dropIfExists('movimentos');
    }
};
