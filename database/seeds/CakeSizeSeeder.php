<?php

use Illuminate\Database\Seeder;

class CakeSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CakeSize::class, 5)->create();
    }
}
