<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBebidaItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bebida_itens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bebida_id')->unsigned();
            $table->foreign('bebida_id')->references('id')->on('bebidas')->onDelete('cascade');
            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('itens')->onDelete('cascade');
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
        Schema::dropIfExists('bebida_items');
    }
}
