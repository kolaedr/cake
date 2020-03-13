<?php

use Illuminate\Database\Seeder;

class CakeFillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CakeFilling::class, 10)->create();
    }
}
