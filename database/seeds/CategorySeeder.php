<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
                'Торты',
                'Чизкейк',
                'Кексик',
                'Попс',
        ];

        foreach($arr as $item){
            DB::table('categories')->insert([
                'name' => $item,
                'slug' => \Str::slug($item, '-'),
            ]);
        };
    }
}
