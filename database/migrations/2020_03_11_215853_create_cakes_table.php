<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cakes', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 6, 2)->nullable();
            $table->string('text_decoration', 200)->nullable()->default(0);
            $table->string('comments', 200)->nullable()->default(0);
            $table
                ->unsignedBigInteger('order_id');
                $table->foreign('order_id')
                    ->references('id')->on('orders')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('cake_filling_tier_1_id');
                $table->foreign('cake_filling_tier_1_id')
                    ->references('id')->on('cake_fillings')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('cake_filling_tier_2_id')->nullable()->default(null);
                $table->foreign('cake_filling_tier_2_id')
                    ->references('id')->on('cake_fillings')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('cake_filling_tier_3_id')->nullable()->default(null);
                $table->foreign('cake_filling_tier_3_id')
                    ->references('id')->on('cake_fillings')
                    ->onDelete('cascade');

            $table
                ->unsignedBigInteger('cake_top_decoration_id')->nullable()->default(null);
                $table->foreign('cake_top_decoration_id')
                    ->references('id')->on('cake_top_decorations')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('cake_side_decoration_id')->nullable()->default(null);
                $table->foreign('cake_side_decoration_id')
                    ->references('id')->on('cake_side_decorations')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('cake_size_id');
                $table->foreign('cake_size_id')
                    ->references('id')->on('cake_sizes')
                    ->onDelete('cascade');
            // $table
            //     ->unsignedBigInteger('more_ingridient_id')->nullable()->default(null);
            //     $table->foreign('more_ingridient_id')
            //         ->references('id')->on('additional_fillers')
            //         ->onDelete('cascade');
            // $table
            //     ->unsignedBigInteger('more_decoration_id')->nullable()->default(null);
            //     $table->foreign('more_decoration_id')
            //         ->references('id')->on('additional_decorations')
            //         ->onDelete('cascade');

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
        Schema::dropIfExists('cakes');
    }
}
