<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Je seed les identifiants de l'admin dans la bdd

        $user = new User();
        $user->name = "Edouard";
        $user->email = "edouard.wefashion@gmail.com";
        $user->password = Hash::make("edouardwf2023");
        $user->role = "admin";
        $user->save();

        $user = new User();
        $user->name = "Adam Coulibaly";
        $user->email = "ismomee2403@gmail.com";
        $user->password = Hash::make("meesmo2403");
        $user->save();
    }
}
