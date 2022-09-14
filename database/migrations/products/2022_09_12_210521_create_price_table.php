<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('productid')->unsigned();
            $table->integer('original');
            $table->integer('final');
            $table->integer('discount_percentage')->nullable();
            $table->string('currency')->default('EUR');
            $table->timestamps();
            $table->foreign('productid')
                ->references('id')
                ->on('products')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price');
    }
}
