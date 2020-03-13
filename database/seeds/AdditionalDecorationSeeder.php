<?php

use Illuminate\Database\Seeder;

class AdditionalDecorationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AdditionalDecoration::class, 10)->create();
    }
}
