<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'description',
        'price',
        'size',
        'picture',
        'is_visible',
        'state',
        'reference',
        'categories_id'
    ];

    //On crée une fonction qui va récupérer les id de la table size et products pour les stocker dans la table pivot.
    public function ProductSizes(){
        return $this->belongsToMany(Size::class, 'pivot_size_products','product_id', 'size_id');
    }

    //On spécifie que la table products appartient à la table catégories
    public function CategorieProduct(){
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
