<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = new User();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 0');

        // Insertar un usuario con ID 0
        DB::table('users')->insert([
            'id' => 0,
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@elorrieta.com',
            'password' => bcrypt('Elorrieta00'),
            'address' => 'Calle admin',
            'phone' => 666666666, 
            'dni' => '12345678D',
        ]);
    

        // Reactivar el incremento automático para la columna 'id'
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');
    }
}
