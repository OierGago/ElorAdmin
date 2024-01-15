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
            'name' => 'Implantación de sistemas operativos',
            'year' => '1',
        ]);

        $moduleModel->create([
            'name' => 'Fundamentos de hardware',
            'year' => '1',
        ]);

        $moduleModel->create([
            'name' => 'Gestión de bases de datos',
            'year' => '1',
        ]);

        $moduleModel->create([
            'name' => 'Lenguajes de marcas y sistemas de gestión de información',
            'year' => '1',
        ]);

        $moduleModel->create([
            'name' => 'Formación y orientación laboral',
            'year' => '1',
        ]);

        $moduleModel->create([
            'name' => 'Administración de sistemas operativos',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Servicios de red e Internet',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Administración de sistemas gestores de bases de datos',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Implantación de aplicaciones web',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Seguridad y alta disponibilidad',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Proyecto de administración de sistemas informáticos en red',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Inglés técnico',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Empresa e iniciativa emprendedora',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Formación en centros de trabajo',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Sistemas informáticos',
            'year' => '1',
        ]);

        $moduleModel->create([
            'name' => 'Bases de datos',
            'year' => '1',
        ]);

        $moduleModel->create([
            'name' => 'Programación',
            'year' => '1',
        ]);

        $moduleModel->create([
            'name' => 'Lenguaje de marcas y sistema de gestión de información',
            'year' => '1',
        ]);

        $moduleModel->create([
            'name' => 'Entornos de desarrollo',
            'year' => '1',
        ]);

        $moduleModel->create([
            'name' => 'Acceso a datos',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Desarrollo de interfaces',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Programación multimedia y dispositios móviles',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Programación de servicios y procesos',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Sistemas de gestión empresarial',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Proyecto de desarrollo de aplicaciones multiplataformas',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Desarrollo web en entorno cliente',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Desarrollo web en entorno servidor',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Despliegue de aplicaciones web',
            'year' => '2',
        ]);

        $moduleModel->create([
            'name' => 'Diseño de interfaces web',
            'year' => '2',
        ]);


    $moduleModel->create([
        'name' => 'Planificación y administración de redes',
        'year' => '1',
    ]);

    $moduleModel->create([
        'name'=>'Proyecto de desarrollo de aplicaciones web',
        'year' => '2',
    ]);
    }
}
