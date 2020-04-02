<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            [
                'name' => 'Морковный',
                'price' => '150',
                'image' => '/images/side-1.jpeg',
                'describe' => 'Морковный Морковный Морковный Морковный',
            ],
            [
                'name' => 'Оливковый',
                'price' => '400',
                'image' => '/images/side-2.jpg',
                'describe' => 'Оливковый Оливковый Оливковый',
            ],
            [
                'name' => 'Смузихлеб',
                'price' => '700',
                'image' => '/images/side-3.jpg',
                'describe' => 'Смузихлеб Смузихлеб Смузихлеб',
            ],
            [
                'name' => '6 Кексов',
                'price' => '180',
                'image' => '/images/side-3.jpg',
                'describe' => '6 кексов',
            ],

            [
                'name' => '8 Кексов',
                'price' => '250',
                'image' => '/images/side-3.jpg',
                'describe' => '8 чудных кексов',
            ],

        ];

        foreach($arr as $item){
            DB::table('products')->insert([
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
