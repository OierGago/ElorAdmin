<?php

namespace Database\Seeders;

use App\Models\ProfessorCycle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $professorCycleModel = new ProfessorCycle();

        $professorCycleModel->create([
            'user_id' => '1001',
            'cycle_id' => '1',
            'module_id' => '16'
        ]);

        $professorCycleModel->create([
            'user_id' => '1001',
            'cycle_id' => '1',
            'module_id' => '12'
        ]);

        $professorCycleModel->create([
            'user_id' => '1001',
            'cycle_id' => '1',
            'module_id' => '5'
        ]);
        $professorCycleModel->create([
            'user_id' => '1002',
            'cycle_id' => '1',
            'module_id' => '5'
        ]);
        $professorCycleModel->create([
            'user_id' => '1002',
            'cycle_id' => '1',
            'module_id' => '5'
        ]);
    }
}
