<?php

namespace Database\Seeders;

use App\Models\Cycle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cycleModel = new Cycle();

        $cycleModel->create([
            'name' => 'DAM',
            'department_id' => '1'
        ]);

        $cycleModel->create([
            'name' => 'DAW',
            'department_id' => '1'
        ]);

        $cycleModel->create([
            'name' => 'ASIR',
            'department_id' => '1'
        ]);
    }
}
