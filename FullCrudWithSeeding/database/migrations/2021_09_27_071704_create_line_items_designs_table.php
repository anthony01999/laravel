<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineItemsDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_items_designs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('design_id');
            $table->unsignedBigInteger('line_id');
            $table->unsignedBigInteger('order_id');
            $table->unique(['design_id', 'line_id', 'order_id']);
            $table->timestamps();

            $table->foreign('design_id')->references('designId')->on('designs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('line_id')->references('lineId')->on('line_items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('order_id')->references('orderId')->on('orders')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('line_items_designs');
    }
}
