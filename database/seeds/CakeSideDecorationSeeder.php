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
        // factory(App\CakeSideDecoration::class, 10)->create();

        $CakeFilling = [
            [
                'name' => 'Голый',
                'price' => '0',
                'image' => '/images/side-2.jpg',
                'describe' => 'ss',
            ],
            [
                'name' => 'Крем',
                'price' => '0',
                'image' => '/images/side-1.jpeg',
                'describe' => 'ss',
            ],
            [
                'name' => 'Потеки',
                'price' => '0',
                'image' => '/images/side-3.jpg',
                'describe' => 'ss',
            ],

        ];

        foreach($CakeFilling as $item){
            DB::table('cake_side_decorations')->insert([
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
