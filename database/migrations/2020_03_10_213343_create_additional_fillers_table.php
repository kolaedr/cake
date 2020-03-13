<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalFillersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_fillers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 200)->unique();
            $table->decimal('price', 8, 2)->default(0)->nullable();
            $table->string('image')->nullable();
            $table->text('describe')->nullable();
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
        Schema::dropIfExists('additional_fillers');
    }
}
