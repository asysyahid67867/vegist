<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::updateOrCreate([
            'id' => 1
        ],[
            'name' => 'Superadmin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('superadmin123'),
        ]);
    }
}
