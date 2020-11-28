<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'name' => 'Admin',
    		'username' => 'admin',
    		'level' => 'admin',
    		'password' => 'admin',
    		'photo' => 'default.jpg'
    	]);
    }
}
