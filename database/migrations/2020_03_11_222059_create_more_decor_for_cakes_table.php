<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoreDecorForCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('more_decor_for_cakes', function (Blueprint $table) {
            $table->id();
            $table
                ->unsignedBigInteger('additional_decorations_id');
                $table->foreign('additional_decorations_id')
                    ->references('id')->on('additional_decorations')
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
        Schema::dropIfExists('more_decor_for_cakes');
    }
}
