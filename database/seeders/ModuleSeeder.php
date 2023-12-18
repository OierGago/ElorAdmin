<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $moduleModel = new Module();

        $moduleModel->create([
            'name' => 'Implantación de sistemas operativoss',
        ]);

        $moduleModel->create([
            'name' => 'Fundamentos de hardware',
        ]);

        $moduleModel->create([
            'name' => 'Gestión de bases de datos',
        ]);

        $moduleModel->create([
            'name' => 'Lenguajes de marcas y sistemas de gestión de información',
        ]);

        $moduleModel->create([
            'name' => 'Formación y orientación laboral',
        ]);

        $moduleModel->create([
            'name' => 'Administración de sistemas operativos',
        ]);

        $moduleModel->create([
            'name' => 'Servicios de red e Internet',
        ]);

        $moduleModel->create([
            'name' => 'Administración de sistemas gestores de bases de datos',
        ]);

        $moduleModel->create([
            'name' => 'Implantación de aplicaciones web',
        ]);

        $moduleModel->create([
            'name' => 'Seguridad y alta disponibilidad',
        ]);

        $moduleModel->create([
            'name' => 'Proyecto de administración de sistemas informáticos en red',
        ]);

        $moduleModel->create([
            'name' => 'Inglés técnico',
        ]);

        $moduleModel->create([
            'name' => 'Empresa e iniciativa emprendedora',
        ]);

        $moduleModel->create([
            'name' => 'Formación en centros de trabajo',
        ]);

        $moduleModel->create([
            'name' => 'Sistemas informáticos',
        ]);

        $moduleModel->create([
            'name' => 'Bases de datos',
        ]);

        $moduleModel->create([
            'name' => 'Programación',
        ]);

        $moduleModel->create([
            'name' => 'Lenguaje de marcas y sistema de gestión de información',
        ]);

        $moduleModel->create([
            'name' => 'Entornos de desarrollo',
        ]);

        $moduleModel->create([
            'name' => 'Acceso a datos',
        ]);

        $moduleModel->create([
            'name' => 'Desarrollo de interfaces',
        ]);

        $moduleModel->create([
            'name' => 'Programación multimedia y dispositios móviles',
        ]);

        $moduleModel->create([
            'name' => 'Programación de servicios y procesos',
        ]);

        $moduleModel->create([
            'name' => 'Sistemas de gestión empresarial',
        ]);

        $moduleModel->create([
            'name' => 'Proyecto de desarrollo de aplicaciones multiplataformas',
        ]);

        $moduleModel->create([
            'name' => 'Desarrollo web en entorno cliente',
        ]);

        $moduleModel->create([
            'name' => 'Desarrollo web en entorno servidor',
        ]);

        $moduleModel->create([
            'name' => 'Despliegue de aplicaciones web',
        ]);

        $moduleModel->create([
            'name' => 'Diseño de interfaces web',
        ]);


    $moduleModel->create([
        'name' => 'Planificación y administración de redes',
    ]);

    $moduleModel->create(['name'=>'Proyecto de desarrollo de aplicaciones web',]);
    }
}
