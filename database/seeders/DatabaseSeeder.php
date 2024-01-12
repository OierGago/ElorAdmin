<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\ProfessorCycle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            DepartmentSeeder::class,
            CycleSeeder::class,
            ModuleSeeder::class,
            UserSeeder::class,
            RolesUsersSeeder::class,
            CycleModuleSeeder::class,
            ProfessorCycle::class,
        ]);
    }
}
