<?php

use Illuminate\Database\Seeder;

class CakeSideDecorationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CakeSideDecoration::class, 10)->create();
    }
}
