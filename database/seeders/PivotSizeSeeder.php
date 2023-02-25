<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PivotSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // créer 240 relations dans la table pivot_product_size
        for ($i = 0; $i < 240; $i++) {
            // génère un produit aléatoire
            $product = Product::all()->random();
            // génère une taille aléatoire
            $size = Size::all()->random();

            // créer une relation entre le produit et la taille si il n'en existe pas déjà une .
            // Appeler la méthode syncWithoutDetaching() avec le tableau de valeurs supplémentaires représentant les champs created_at et updated_at
            $product->ProductSizes()->syncWithoutDetaching([$size->id => ['created_at' => Carbon::now(),'updated_at' => Carbon::now()]]);

        }
    }
}
