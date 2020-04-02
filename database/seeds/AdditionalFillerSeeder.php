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
        // factory(App\AdditionalFiller::class, 5)->create();

        $base = [
            [
                'name' => 'Яблоки',
                'price' => '50',
                'image' => '/images/alisa.jpg',
                'describe' => 'Что то немножко или множко... По согласованию',
            ],
            [
                'name' => 'Груши',
                'price' => '100',
                'image' => '/images/alisa.jpg',
                'describe' => 'Что то немножко или множко... По согласованию',
            ],
            [
                'name' => 'Киви',
                'price' => '50',
                'image' => '/images/alisa.jpg',
                'describe' => 'Что то немножко или множко... По согласованию',
            ],
            [
                'name' => 'Фигня',
                'price' => '200',
                'image' => '/images/alisa.jpg',
                'describe' => 'Что то немножко или множко... По согласованию',
            ],


        ];

        foreach($base as $item){
            DB::table('additional_fillers')->insert([
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
