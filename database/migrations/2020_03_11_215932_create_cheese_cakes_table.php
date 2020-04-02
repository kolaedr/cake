<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheeseCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheese_cakes', function (Blueprint $table) {
            $table->id();
            $table->string('text_decoration', 200);
            $table->text('comment');
            $table
                ->unsignedBigInteger('order_id');
                $table->foreign('order_id')
                    ->references('id')->on('orders')
                    ->onDelete('cascade');

            $table
                ->unsignedBigInteger('cake_top_decoration_id');
                $table->foreign('cake_top_decoration_id')
                    ->references('id')->on('cake_top_decorations')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('cake_size_id');
                $table->foreign('cake_size_id')
                    ->references('id')->on('cake_sizes')
                    ->onDelete('cascade');
            // $table
            //     ->unsignedBigInteger('more_ingridient_id')->nullable();
            //     $table->foreign('more_ingridient_id')
            //         ->references('id')->on('additional_fillers')
            //         ->onDelete('cascade');
            $table
                ->unsignedBigInteger('more_decoration_id')->nullable();
                $table->foreign('more_decoration_id')
                    ->references('id')->on('additional_decorations')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('cheese_cakes');
    }
}
