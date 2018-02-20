<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'user_id'   => 1,
            'content'   => 'Este es mi primer mensaje',
            'image'     => 'https://lorempixel.com/600/338?1',
        ]);

        Message::create([
            'user_id'   => 1,
            'content'   => 'Este es mi segundo mensaje',
            'image'     => 'https://lorempixel.com/600/338?2',
        ]);

        Message::create([
            'user_id'   => 1,
            'content'   => 'Este es mi tercer mensaje',
            'image'     => 'https://lorempixel.com/600/338?3',
        ]);

        Message::create([
            'user_id'   => 1,
            'content'   => 'Este es mi cuarto mensaje',
            'image'     => 'https://lorempixel.com/600/338?4',
        ]);
    }
}
