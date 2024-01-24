<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chats_users')->insert([
            "chat_id"=> 1,
            "user_id"=> 2
            ]);
            
        DB::table('chats_users')->insert([
            "chat_id"=> 1,
            "user_id"=> 6
            ]);    

        DB::table('chats_users')->insert([
            "chat_id"=> 1,
            "user_id"=> 15
            ]);  

        DB::table('chats_users')->insert([
            "chat_id"=> 1,
            "user_id"=> 20
            ]);
                
        DB::table('chats_users')->insert([
            "chat_id"=> 2,
            "user_id"=> 3
            ]);    
    
        DB::table('chats_users')->insert([
            "chat_id"=> 2,
            "user_id"=> 26
            ]);

        DB::table('chats_users')->insert([
            "chat_id"=> 2,
            "user_id"=> 64
            ]);
                
        DB::table('chats_users')->insert([
            "chat_id"=> 2,
            "user_id"=> 22
            ]);    
    
        DB::table('chats_users')->insert([
            "chat_id"=> 3,
            "user_id"=> 4
            ]);  
    
        DB::table('chats_users')->insert([
            "chat_id"=> 3,
            "user_id"=> 102
            ]);
                    
        DB::table('chats_users')->insert([
            "chat_id"=> 3,
            "user_id"=> 88
            ]);    
        
        DB::table('chats_users')->insert([
            "chat_id"=> 3,
            "user_id"=> 97
            ]); 

        DB::table('chats_users')->insert([
            "chat_id"=> 4,
            "user_id"=> 1002
            ]);
                
        DB::table('chats_users')->insert([
            "chat_id"=> 4,
            "user_id"=> 7
            ]);    
    
        DB::table('chats_users')->insert([
            "chat_id"=> 4,
            "user_id"=> 77
            ]);  
    
        DB::table('chats_users')->insert([
            "chat_id"=> 4,
            "user_id"=> 138
            ]);
                    
        DB::table('chats_users')->insert([
            "chat_id"=> 5,
            "user_id"=> 1003
            ]);    
        
        DB::table('chats_users')->insert([
            "chat_id"=> 5,
            "user_id"=> 40
            ]);
    
        DB::table('chats_users')->insert([
            "chat_id"=> 5,
            "user_id"=> 50
            ]);
                    
        DB::table('chats_users')->insert([
            "chat_id"=> 5,
            "user_id"=> 80
            ]);    
        
        DB::table('chats_users')->insert([
            "chat_id"=> 6,
            "user_id"=> 1004
            ]);  
        
        DB::table('chats_users')->insert([
            "chat_id"=> 6,
            "user_id"=> 30
            ]);
                        
        DB::table('chats_users')->insert([
            "chat_id"=> 6,
            "user_id"=> 68
            ]);    
            
        DB::table('chats_users')->insert([
            "chat_id"=> 6,
            "user_id"=> 99
            ]);    
    }
}