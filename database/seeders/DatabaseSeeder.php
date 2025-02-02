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
        // $user = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@example.org',
        //     'password' => bcrypt('secret'),
        //     'logo' => fake()->imageUrl(),
        // ]);
        // $user->roles()->attach(1);
        //
        // Create an admin
        $user = User::create([
            'name' => 'Mahdi N.',
            'email' => 'me@mail.com',
            'password' => bcrypt('password'),
            // 'logo' => fake()->imageUrl(),
        ]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        User::factory(5)->create();
        Language::factory(3)->create();
        Dialect::factory(25)->create();
        Term::factory(50)->create();
        Definition::factory(50)->create();
    }
}
