<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name' => 'Ahmedabad',
            'state_id' => 1,
        ]);

        DB::table('cities')->insert([
            'name' => 'Surat',
            'state_id' => 1,
        ]);
        
		DB::table('cities')->insert([
            'name' => 'Vadodara',
            'state_id' => 1,
        ]);
        
        
        DB::table('cities')->insert([
            'name' => 'Jaipur',
            'state_id' => 2,
        ]);
        
        
        DB::table('cities')->insert([
            'name' => 'Udaipur',
            'state_id' => 2,
        ]);
        
        
                


    }
}
