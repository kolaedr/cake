<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table
                ->unsignedBigInteger('user_id');
                $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            // $table
            //     ->unsignedBigInteger('cake_id')->nulleble();
            //     $table->foreign('cake_id')
            //         ->references('id')->on('cakes')
            //         ->onDelete('cascade');
            $table
                ->unsignedBigInteger('status_id')->nulleble();
                    $table->foreign('status_id')
                        ->references('id')->on('statuses')
                        ->onDelete('cascade');
            $table
                ->unsignedBigInteger('delivery_id')->nulleble();
                    $table->foreign('delivery_id')
                        ->references('id')->on('deliveries')
                        ->onDelete('cascade');
            $table->string('comments', 200);
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
        Schema::dropIfExists('orders');
    }
}
