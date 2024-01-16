<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\RoleUser;

class RolesUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('ALTER TABLE role_user AUTO_INCREMENT = 0');

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('ALTER TABLE role_user AUTO_INCREMENT = 1');        

        RoleUser::factory()->count(1000)->create(['role_id' => '3']);
        RoleUser::factory()->count(80)->create(['role_id' => '2']);
    }
}
