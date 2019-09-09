<?php

use App\Models\User;
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
        	'name' => 'Eber Ortiz Mas',
        	'email' => 'ortizmas14@gmail.com',
        	'password' => bcrypt('secret'),
        ]);
    }
}
