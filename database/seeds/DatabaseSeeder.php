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
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        $this->call(AdditionalDecorationSeeder::class);   
        $this->call(AdditionalFillerSeeder::class);   
        $this->call(CakeFillingSeeder::class);   
        $this->call(CakeSideDecorationSeeder::class);   
        $this->call(CakeTopDecorationSeeder::class);   
        $this->call(StatusSeeder::class);   
        $this->call(DeliverySeeder::class);   
        $this->call(CakeSizeSeeder::class);   
        $this->call(CakeSeeder::class);   
        $this->call(OrderCakeSeeder::class);   
        $this->call(OrderSeeder::class);   
    }
}
