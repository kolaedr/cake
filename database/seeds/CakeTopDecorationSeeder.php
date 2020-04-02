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
        // factory(App\CakeTopDecoration::class, 10)->create();

        $CakeFilling = [
            [
                'name' => 'Венок из ягод ( в сезон).',
                'price' => '50',
                'image' => '/images/top-1.jpg',
                'describe' => 'ss',
            ],
            [
                'name' => 'Горка с ягод ( в сезон)',
                'price' => '60',
                'image' => '/images/top-2.jpg',
                'describe' => 'ss',
            ],
            [
                'name' => 'Рожок с ягодами (в сезон)',
                'price' => '70',
                'image' => '/images/top-3.jpg',
                'describe' => 'ss',
            ],
            [
                'name' => 'Рожок с конфетами',
                'price' => '80',
                'image' => '/images/top-4.jpg',
                'describe' => 'ss',
            ],
            [
                'name' => 'Горка с конфетами',
                'price' => '90',
                'image' => '/images/top-5.jpg',
                'describe' => 'ss',
            ],


        ];

        foreach($CakeFilling as $item){
            DB::table('cake_top_decorations')->insert([
                'name' => $item['name'],
                'slug' => Str::slug($item['name'], '-'),
                'price' => $item['price'],
                'image' => $item['image'],
                'describe' => $item['describe'],
                'visible' => 1,
            ]);
        };
    }
}
