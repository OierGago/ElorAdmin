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

        Module::truncate();

        $moduleModel = new Module();

        $moduleModel->create([
            'name' => 'Sistemas informáticos',
            //hay que cambiar la base de datos un ciclo puede estar en varios modulos y un modulo puede tener varios ciclos
            'cycle_id' => '1'
        ]);
    }
}
