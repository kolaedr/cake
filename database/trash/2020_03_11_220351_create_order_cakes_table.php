<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_cakes', function (Blueprint $table) {
            $table->id();

            $table
                ->unsignedBigInteger('order_id');
                $table->foreign('order_id')
                    ->references('id')->on('orders')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('cake_id')->nullable();
                $table->foreign('cake_id')
                    ->references('id')->on('cakes')
                    ->onDelete('cascade');
            $table->decimal('count', 50);
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
        Schema::dropIfExists('order_cakes');
    }
}
