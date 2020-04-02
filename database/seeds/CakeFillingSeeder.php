<?php

use Illuminate\Database\Seeder;

class CakeFillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\CakeFilling::class, 10)->create();

        $CakeFilling = [
            [
                'name' => 'Алиса',
                'price' => '300',
                'image' => '/images/alisa.jpg',
                'describe' => 'Ванильные бисквитные коржи, сливочно-сырный крем, а в начинке персики, малина или на Ваш вкус ягоды или фрукты, сливочно-сырный крем в оформлении.',
            ],
            [
                'name' => 'Вишня в шоколаде',
                'price' => '350',
                'image' => '/images/chery.jpg',
                'describe' => 'Шоколадные бисквитные коржи, насыщенный шоколадный крем и много вишни.',
            ],
            [
                'name' => 'Свадебная вишня',
                'price' => '200',
                'image' => '/images/marry.jpg',
                'describe' => 'Шоколадные бисквитные коржи, сливочно-сырный крем и много вишни',
            ],
            [
                'name' => 'Шоколадно — банановый торт',
                'price' => '250',
                'image' => '/images/bananas.jpeg',
                'describe' => 'Шоколадные бисквитные коржи, насыщенный шоколадный крем с кусочками банана и бананово-сливочное суфле',
            ],
            [
                'name' => 'Сникерс',
                'price' => '400',
                'image' => '/images/sneekers.jpeg',
                'describe' => 'Шоколадный(или ванильный бисквит), слой шоколадного крема с орешками(грецкий и арахис), прослойка безе, сгущеночно-масляный крем с орешками(грецкий и арахис).',
            ],
        ];

        foreach($CakeFilling as $item){
            DB::table('cake_fillings')->insert([
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
