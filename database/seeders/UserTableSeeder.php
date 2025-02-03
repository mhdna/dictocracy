<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
            'name' => 'Admin',
            'email' => 'me@mail.com',
            'password' => bcrypt('password'),
            // 'logo' => fake()->imageUrl(),
        ]);

        $role = Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        User::create([
            'name' => 'Test',
            'email' => 'test@mail.com',
            'password' => bcrypt('password'),
            // 'logo' => fake()->imageUrl(),
        ]);

        User::factory(5)->create();
    }
}
