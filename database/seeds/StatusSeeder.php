<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Status::class, 5)->create();

        $status = [
                'New','Pending','Confirm','In WORK','Delivery','Done',
        ];

        foreach($status as $item){
            DB::table('statuses')->insert([
                'name' => $item,
            ]);
        };

    }
}
