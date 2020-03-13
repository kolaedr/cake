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
            $table->string('text_decoration', 200);
            $table->text('comment');
            $table->timestamp('booking_time', 0);
            $table
                ->unsignedBigInteger('cake_filling_lavel_1_id');
                $table->foreign('cake_filling_lavel_1_id')
                    ->references('id')->on('cake_fillings')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('cake_filling_lavel_2_id')->nulleble();
                $table->foreign('cake_filling_lavel_2_id')
                    ->references('id')->on('cake_fillings')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('cake_filling_lavel_3_id')->nulleble();
                $table->foreign('cake_filling_lavel_3_id')
                    ->references('id')->on('cake_fillings')
                    ->onDelete('cascade');

            $table
                ->unsignedBigInteger('cake_top_decoration_id');
                $table->foreign('cake_top_decoration_id')
                    ->references('id')->on('cake_top_decorations')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('cake_side_decoration_id');
                $table->foreign('cake_side_decoration_id')
                    ->references('id')->on('cake_side_decorations')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('cake_size_id');
                $table->foreign('cake_size_id')
                    ->references('id')->on('cake_sizes')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('more_ingridient_id')->nulleble();
                $table->foreign('more_ingridient_id')
                    ->references('id')->on('additional_fillers')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('more_decoration_id')->nulleble();
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
        Schema::dropIfExists('cakes');
    }
}
