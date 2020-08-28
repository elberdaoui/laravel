<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		User::create([
			'username' => 'Admin',
			'password' => Hash::make('123456789'),
			'email' => 'larchaouie@gmail.com',
            'description'=> str_random(100),
			'profile_image' => 'abcd.jpg',
			'role' => 'Admin',
			'remember_token' => str_random(10)			
		]);
    }
}
