<?php

namespace Database\Seeders;

use App\Models\Dialect;
use App\Models\Language;
use App\Models\User;
use App\Models\Word;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Lang;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create();
        Language::factory(10)->create();
        Dialect::factory(10)->create();
        Word::factory(100)->create();
    }
}
