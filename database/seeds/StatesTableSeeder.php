<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'name' => 'Gujarat',
        ]);

        DB::table('states')->insert([
            'name' => 'Rajasthan',
        ]);

        DB::table('states')->insert([
            'name' => 'MP',
        ]);

        DB::table('states')->insert([
            'name' => 'UP',
        ]);

       
    }
}
