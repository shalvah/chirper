<?php

use App\Chirp;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 10)->create();
        factory(Chirp::class, 30)->create();
    }
}
