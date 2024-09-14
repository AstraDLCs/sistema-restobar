<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contraseña = "12345678";
        $user = new User([
            "email" => "admin@gmail.com",
            "password" => Hash::make($contraseña),
            "name" => "Administrador",
        ]);
        $user->saveOrFail();
    }
}
