<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCakeSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cake_sizes', function (Blueprint $table) {
            $table->id();
            $table->set('lavel', ['1', '2', '3', '1-2', '2-3']);
            $table->decimal('weight_min', 5, 2);
            $table->decimal('weight_max', 5, 2);
            $table->decimal('price', 8, 2)->default(0);
            $table->integer('piece_min');
            $table->integer('piece_max');
            // $table->integer('piece')->default(4);
            $table->boolean('visible')->default(true);
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
        Schema::dropIfExists('cake_sizes');
    }
}
