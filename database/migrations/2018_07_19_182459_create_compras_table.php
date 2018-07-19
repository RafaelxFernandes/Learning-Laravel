<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->float('valor');
            $table->integer('id_cliente')->unsigned()->nullable();
            $table->integer('id_produto')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('compras', function(Blueprint $table){
            $table->foreign('id_cliente')->references('id')->on('clients')->onDelete('set null');
            $table->foreign('id_produto')->references('id')->on('produtos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
