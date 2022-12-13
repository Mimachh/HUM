<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Migrant'],
            ['id' => 2,'name' => 'Association'],
            ['id' => 3,'name' => 'Propriétaire'],
            ['id' => 4,'name' => 'Admin'],
        
        ]);

        DB::table('users')->insert([
            'name' => 'Karl',
            'email' => 'karl@gmail.com',
            'role_id' => '2',
            'password' => '$2y$10$IPv0PIci0HR04KiyrWs4JuzN6aSz7L7PbOuxiRU6V1IuCfaVcDK8C',
        ]);

        DB::table('conditions')->insert([
            ['id' => 1, 'name' => 'Maison'],
            ['id' => 2,'name' => 'Appartement'],
            ['id' => 3,'name' => 'Terrain'],
            ['id' => 4,'name' => 'Chambre'],
            ['id' => 5,'name' => 'Canapé-lit'],
        ]);
        
        DB::table('villes')->insert([
            ['id' => 1, 'name' => 'Le mans'],
          
        ]);
        
    }
}
