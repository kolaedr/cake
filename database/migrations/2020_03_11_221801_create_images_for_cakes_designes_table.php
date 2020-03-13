<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesForCakesDesignesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_for_cakes_designes', function (Blueprint $table) {
            // $table->id();
            $table
                ->unsignedBigInteger('image_id');
                $table->foreign('image_id')
                    ->references('id')->on('images')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('cake_id');
                $table->foreign('cake_id')
                    ->references('id')->on('cakes')
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
        Schema::dropIfExists('images_for_cakes_designes');
    }
}
