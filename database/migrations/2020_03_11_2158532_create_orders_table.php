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
            //     ->unsignedBigInteger('cake_id')->nullable();
            //     $table->foreign('cake_id')
            //         ->references('id')->on('cakes')
            //         ->onDelete('cascade');
            $table->string('booking');
            $table->string('delivery')->nullable();
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->string('admin_comment')->nullable();
            $table->decimal('count', 5, 0)->default(0);
            $table
                ->unsignedBigInteger('status_id')->nullable();
                    $table->foreign('status_id')
                        ->references('id')->on('statuses')
                        ->onDelete('cascade');
            $table
                ->unsignedBigInteger('delivery_id')->nullable();
                    $table->foreign('delivery_id')
                        ->references('id')->on('deliveries')
                        ->onDelete('cascade');
            $table->string('comments', 200)->nullable()->default(0);
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
