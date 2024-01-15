<?php

namespace Database\Seeders;

use App\Models\ProfessorCycle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessorCycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $professorCycleModel = new ProfessorCycle();

        $professorCycleModel->create([
            'cycle_id' => '1',
            'user_id' => '1001',
            'module_id' => '16'
        ]);

        $professorCycleModel->create([
            'cycle_id' => '1',
            'user_id' => '1001',
            'module_id' => '12'
        ]);

        $professorCycleModel->create([
            'cycle_id' => '1',
            'user_id' => '1001',
            'module_id' => '5'
        ]);
        $professorCycleModel->create([
            'cycle_id' => '1',
            'user_id' => '1002',
            'module_id' => '5'
        ]);
        $professorCycleModel->create([
            'cycle_id' => '1',
            'user_id' => '1002',
            'module_id' => '5'
        ]);
    }
}
