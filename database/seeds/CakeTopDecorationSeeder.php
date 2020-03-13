<?php

use Illuminate\Database\Seeder;

class CakeTopDecorationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CakeTopDecoration::class, 10)->create();
    }
}
