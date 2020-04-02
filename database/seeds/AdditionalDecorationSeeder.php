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
        // factory(App\AdditionalDecoration::class, 5)->create();

        $base = [
            [
                'name' => 'Пряник',
                'price' => '50',
                'image' => '/images/alisa.jpg',
                'describe' => 'Что то немножко или множко... По согласованию',
            ],
            [
                'name' => 'Виски',
                'price' => '100',
                'image' => '/images/alisa.jpg',
                'describe' => 'Что то немножко или множко... По согласованию',
            ],
            [
                'name' => 'Макаруны',
                'price' => '50',
                'image' => '/images/alisa.jpg',
                'describe' => 'Что то немножко или множко... По согласованию',
            ],
            [
                'name' => 'Открытка',
                'price' => '200',
                'image' => '/images/alisa.jpg',
                'describe' => 'Что то немножко или множко... По согласованию',
            ],


        ];

        foreach($base as $item){
            DB::table('additional_decorations')->insert([
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
