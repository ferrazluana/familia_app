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
        Schema::create('membros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('data_nascimento')->date();
            $table->text('celular')->nullable();
            $table->text('endereco')->nullable();
            $table->text('estado_civil')->nullable();

            $table->boolean('batizado')->default(true);
            $table->boolean('lider')->default(true);
            $table->boolean('pastor')->default(true);

            $table->text('personalidade')->nullable();
            $table->text('linguagem_amor')->nullable();

            $table->boolean('enabled')->default(true);
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
        Schema::dropIfExists('membros');
    }
};
