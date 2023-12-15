<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roleModel = new Role();

        $roleModel->create([
            'name' => 'administrador'
        ]);

        $roleModel->create([
            'name' => 'profesor'
        ]);

        $roleModel->create([
            'name' => 'estudiante'
        ]);

        $roleModel->create([
            'name' => 'jefe de departamento'
        ]);

        $roleModel->create([
            'name' => 'dirección'
        ]);

        $roleModel->create([
            'name' => 'bedel'
        ]);

        $roleModel->create([
            'name' => 'limpieza'
        ]);
    }
}
