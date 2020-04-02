<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lists', function (Blueprint $table) {
            $table
                ->unsignedBigInteger('order_id');
                $table->foreign('order_id')
                    ->references('id')->on('orders')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('product_id');
                $table->foreign('product_id')
                    ->references('id')->on('products')
                    ->onDelete('cascade');
            $table->unsignedTinyInteger('qty');
            $table->decimal('price', 8, 2);
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
        Schema::dropIfExists('order_lists');
    }
}
