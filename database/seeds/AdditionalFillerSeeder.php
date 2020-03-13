<?php

use Illuminate\Database\Seeder;

class AdditionalFillerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AdditionalFiller::class, 10)->create();

    }
}
