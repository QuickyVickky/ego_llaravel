<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('users')->insert([
			'first_name' => 'admin',
			'middle_name' => 'admin',
			'last_name' => 'admin',
			'email' => 'admin@gmail.com',
			'password' => bcrypt('admin@123'),
			'type' => 'admin',
		]);

		DB::table('users')->insert([
			'first_name' => 'Alex',
			'middle_name' => '',
			'last_name' => 'Parker',
			'email' => 'alexparker@gmail.com',
			'password' => bcrypt('user@123'),
			'type' => 'user',
			'phone' => '1234567890',
		]);
	}
}
