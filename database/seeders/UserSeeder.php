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
        DB::table('users')
            ->insert([
                [
                    'name' => 'Long',
                    'email' => 'long@gmail.com',
                    'password' => '123456',
                    'role' => 0,
                    'image' => 'noimage.jpg'
                ],
                [
                    'name' => 'Lam',
                    'email' => 'lam@gmail.com',
                    'password' => '123456',
                    'role' => 0,
                    'image' => 'noimage.jpg'
                ]
            ]);
    }
}
