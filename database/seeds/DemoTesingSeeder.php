<?php

use Illuminate\Database\Seeder;

class DemoTestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    \DB::table('demotestings')->truncate();
    \DB::table('demotestings')->insert(['name' => 'Joe']);
    \DB::table('demotestings')->insert(['name' => 'Jock']);
    \DB::table('demotestings')->insert(['name' => 'Jackie']);
    \DB::table('demotestings')->insert(['name' => 'Jane']);
    }
}
