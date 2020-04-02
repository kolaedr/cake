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
        // factory(App\CakeSize::class, 5)->create();

        $CakeFilling = [
            [
                'tier' => '1',
                'weight_min' => '2',
                'weight_max' => '2.3',
                'price' => '1',
                'piece_min' => '7',
                'piece_max' => '8',
            ],
            [
                'tier' => '1',
                'weight_min' => '2.3',
                'weight_max' => '2.5',
                'price' => '1',
                'piece_min' => '10',
                'piece_max' => '11',
            ],
            [
                'tier' => '1',
                'weight_min' => '3',
                'weight_max' => '3.5',
                'price' => '1',
                'piece_min' => '13',
                'piece_max' => '14',
                'visible' => 'ss',
            ],
            [
                'tier' => '1',
                'weight_min' => '3.8',
                'weight_max' => '4',
                'price' => '1',
                'piece_min' => '18',
                'piece_max' => '20',
            ],
            [
                'tier' => '2',
                'weight_min' => '4',
                'weight_max' => '5',
                'price' => '1.2',
                'piece_min' => '20',
                'piece_max' => '30',
            ],
            [
                'tier' => '2',
                'weight_min' => '5.5',
                'weight_max' => '6.5',
                'price' => '1.3',
                'piece_min' => '30',
                'piece_max' => '40',
            ],
            [
                'tier' => '2-3',
                'weight_min' => '7',
                'weight_max' => '13',
                'price' => '1.3',
                'piece_min' => '40',
                'piece_max' => null,
            ],

        ];

        foreach($CakeFilling as $item){
            DB::table('cake_sizes')->insert([
                'tier' => $item['tier'],
                'weight_min' => $item['weight_min'],
                'weight_max' => $item['weight_max'],
                'price' => $item['price'],
                'piece_min' => $item['piece_min'],
                'piece_max' => $item['piece_max'],
                'visible' => 1,
            ]);
        };
    }
}
