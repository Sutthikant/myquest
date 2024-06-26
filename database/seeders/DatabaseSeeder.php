<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Todo;
use App\Models\User;
use App\Models\Quest;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name" => "KantKaNaa",
            "email" => "mynameisstk@gmail.com",
            "superadmin" => true,
            "password" => "12345678",
        ]);

        User::factory(10)->create();
        Quest::factory(10)->create();
        Todo::factory(10)->create();
        Activity::factory(10)->create();
    }
}
