<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'phone' => '0507507763',
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        DB::table('default_settings')->insert([
            'default_count' => 10,
            'cake_count' => 7,
            'cheesecake_count' => 5,
            'cupcake_count' => 40,
        ]);
        $this->call(AdditionalDecorationSeeder::class);
        $this->call(AdditionalFillerSeeder::class);
        $this->call(CakeFillingSeeder::class);
        $this->call(CakeSideDecorationSeeder::class);
        $this->call(CakeTopDecorationSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(DeliverySeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(CakeSizeSeeder::class);
        $this->call(CakeSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductCategorySeeder::class);

        // $this->call(OrderCakeSeeder::class);

    }
}
