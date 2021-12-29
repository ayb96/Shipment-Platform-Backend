<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('users')->insert([
            'name' => 'Hussein Ayoub',
            'email' => 'hussein@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Assile Ayoub',
            'email' => 'assile@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sally Ayoub',
            'email' => 'sally@gmail.com',
            'password' => bcrypt('123456'),
        ]);

       
    }
}
