<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCheeseakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_cheesecakes', function (Blueprint $table) {
            $table->id();
            $table
                ->unsignedBigInteger('user_id');
                $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('cheese_id')->nullable();
                $table->foreign('cheese_id')
                    ->references('id')->on('cheese_cakes')
                    ->onDelete('cascade');
             $table->decimal('count', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_cheeseakes');
    }
}
