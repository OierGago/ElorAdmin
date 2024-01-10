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
            'name' => 'Administrador'
        ]);

        $roleModel->create([
            'name' => 'Profesor'
        ]);

        $roleModel->create([
            'name' => 'Estudiante'
        ]);

        $roleModel->create([
            'name' => 'Jefe de departamento'
        ]);

        $roleModel->create([
            'name' => 'Dirección'
        ]);

        $roleModel->create([
            'name' => 'Bedel'
        ]);

        $roleModel->create([
            'name' => 'Limpieza'
        ]);
    }
}
