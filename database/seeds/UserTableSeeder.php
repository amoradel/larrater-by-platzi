<?php

use Illuminate\Database\Seeder;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Anibal Moradel',
            'email'      => 'amoradel@outlook.com',
            'password'      => bcrypt('secret'),
            'remember_token' => str_random(10),
            'username'      => 'amoradel',
            'avatar'     => 'https://lorempixel.com/600/338?1',
        ]);
    }
}
