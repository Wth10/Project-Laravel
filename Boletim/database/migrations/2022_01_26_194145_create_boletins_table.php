<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('nota_1_unidade');
            $table->string('nota_2_unidade');
            $table->string('nota_3_unidade');
            $table->string('sala');
            $table->string('turno');
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
        Schema::dropIfExists('boletins');
    }
}
