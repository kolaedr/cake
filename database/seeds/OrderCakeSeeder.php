<?php

use Illuminate\Database\Seeder;

class OrderCakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\OrderCake::class, 10)->create();
    }
}
