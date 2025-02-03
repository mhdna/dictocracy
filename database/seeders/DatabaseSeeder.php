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
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);

        Language::factory(3)->create();
        Dialect::factory(25)->create();
        Term::factory(50)->create();
        Definition::factory(50)->create();
    }
}
