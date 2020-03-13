<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoreAdditionalFillersCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('more_additional_fillers_cakes', function (Blueprint $table) {
            $table->id();
            $table
                ->unsignedBigInteger('additional_filler_id');
                $table->foreign('additional_filler_id')
                    ->references('id')->on('more_additional_fillers_cakes')
                    ->onDelete('cascade');
            $table
                ->unsignedBigInteger('cake_id')->nulleble();
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
        Schema::dropIfExists('more_additional_fillers_cakes');
    }
}
