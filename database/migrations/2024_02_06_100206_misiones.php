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
        Schema::create('misiones', function (Blueprint $table){
            $table->engine="InnoDB";
            $table->id();
            $table->bigInteger('agencia_id')->unsigned();
            $table->string('nombre');
            $table->string('objetivo');
            $table->string('tripulado');
            $table->string('status');
            $table->date('fecha');
            $table->timestamps();
            $table->foreign('agencia_id')->references('id')->on('agencias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('misiones');
    }
};
