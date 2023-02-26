<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        
        for ($i = 0; $i < 80; $i++) {

            
            $categorie = Category::all()->random();

            DB::table('products')->insert([
                'name' => $faker->word(), //génere un mot aléatoire
                'description' => $faker->text(), //génere un text aléatoire de 200 caractère
                'price' => $faker->randomFloat(2), //génere un nombre décimal 
                'is_visible' => $faker->randomElement([true, false]), //génere un booleen aléatoire
                'state' => $faker->randomElement([true, false]), //génere un booleen aléatoire
                'reference' =>$faker->bothify('?????-####'), //génere une référence
                'categories_id' => $categorie->id, //récupère l'id de la categorie générée
                'picture' => "img/" . $categorie->name . "-" . $faker->numberBetween(1, 10) . ".jpg", // génere un nom de fichier composé du nom de la categorie suivit d'un id
                // insertion des timestamp à l'aide de la classe Carbon
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        } 
    }
}
