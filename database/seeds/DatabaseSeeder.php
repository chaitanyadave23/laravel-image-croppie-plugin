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
         DB::table('posts')->insert([
            'pageid' => 'login_page',
            'title' => 'Login Page' ,
            'content' => '[]',
            'view_count' => '0',

        ]);

         DB::table('posts')->insert([
            'pageid' => 'register_page',
            'title' => 'Register page' ,
            'content' => '[]',
            'view_count' => '0',            
            
        ]);
    }
}


