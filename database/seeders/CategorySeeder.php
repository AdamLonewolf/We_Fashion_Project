<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Je seed la base de données avec les deux catégories : Femme, et Homme.
        
        $category = new Category();
        $category->name = 'Homme';
        $category->save();

        $category = new Category();
        $category->name = 'Femme';
        $category->save();
    }
}
