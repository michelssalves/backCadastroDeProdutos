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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 100);
            $table->string('marca', 100);
            $table->string('modelo', 100);
            $table->string('referencia', 100);
            $table->integer('minimo');
            $table->integer('maximo');
            $table->float('saldo');
            $table->string('endereco', 50);
            $table->float('valor');
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
        Schema::dropIfExists('produtos');
    }
};
