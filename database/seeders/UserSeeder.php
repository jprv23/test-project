<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try{
            /**
             * Crear un usuario por defecto para ingresar al sistema
            */

            $user = new User();
            $user->name = 'admin';
            $user->email = 'admin@gmail.com';
            $user->password = bcrypt('123456789');
            $user->save();

        }catch(Exception $e){
            Log::info($e->getMessage());
        }

    }
}
