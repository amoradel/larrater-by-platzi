<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(MessageTableSeeder::class);
        factory(App\Message::class)
            ->times(100)
            ->create();
    }
}
