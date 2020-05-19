<?php

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('cars')->insert([
            'name' => 'Toyota',
            'price' => '$12000'
            
        ]);
         
         // cmd - php artisan make:seeder CarsTableSeeder

         // cmd - php artisan db:seed --class=CarsTableSeeder
    }
}
