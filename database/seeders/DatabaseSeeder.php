<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Note;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            NoteSeeder::class,
            UserSeeder::class,
        ]);
    }
}
