<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryForUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_for_users', function (Blueprint $table) {
            $table->id();
            $table->string('street', 100);
            $table->integer('build');
            $table->char('build_index')->nullable()->default('');
            $table->integer('room');
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
        Schema::dropIfExists('delivery_for_users');
    }
}
