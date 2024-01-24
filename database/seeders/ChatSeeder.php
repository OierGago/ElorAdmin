<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chats')->insert([
            "name"=>"DAM",
            "is_private"=>false,
            "creator_id"=>2,
            "created_at"=>now(),
            ]);
            
        DB::table('chats')->insert([
            "name"=>"DAW",
            "is_private"=>false,
            "creator_id"=>3,
            "created_at"=>now(),
            ]);    

        DB::table('chats')->insert([
            "name"=>"ASIR",
            "is_private"=>false,
            "creator_id"=>4,
            "created_at"=>now(),
            ]);  

        DB::table('chats')->insert([
            "name"=>"INA",
            "is_private"=>true,
            "creator_id"=>1002,
            "created_at"=>now(),
            ]);
                
        DB::table('chats')->insert([
            "name"=>"IMA",
            "is_private"=>true,
            "creator_id"=>1003,
            "created_at"=>now(),
            ]);    
    
        DB::table('chats')->insert([
            "name"=>"QUI",
            "is_private"=>true,
            "creator_id"=>1004,
            "created_at"=>now(),
            ]);
    }
}