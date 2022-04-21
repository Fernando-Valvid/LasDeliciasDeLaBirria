<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Edmundo',
            'email' => 'edmundo@gmail.com',
            'password' => bcrypt('123456789')
        ]);
    }
}
