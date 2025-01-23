<?php

namespace Database\Seeders;

use App\Models\Definition;
use App\Models\Dialect;
use App\Models\Language;
use App\Models\User;
use App\Models\Term;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'id' => 1,
            'name' => fake()->name(),
            'email' => 'me@mail.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'logo' => fake()->imageUrl(),
            'is_admin' => false,
        ]);

        User::factory(10)->create();
        Language::factory(10)->create();
        Dialect::factory(10)->create();
        Term::factory(1000)->create();
        Definition::factory(2000)->create();
    }
}
