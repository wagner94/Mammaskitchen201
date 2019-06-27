<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePratoItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prato_itens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prato_id')->unsigned();
            $table->foreign('prato_id')->references('id')->on('pratos')->onDelete('cascade');
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
        Schema::dropIfExists('prato_items');
    }
}
