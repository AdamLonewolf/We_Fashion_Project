<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        /**
         * Différents champs de la table products
         */

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',100); //Chaîne de caractère allant jusqu'à 100 caractères max.
            $table->string('description',10000);
            $table->double('price');
            $table->string('picture',220);
            $table->boolean('is_visible')->default(1); //quand le booléen retourne 'true' ou 1, le produit est visible
            $table->boolean('state')->default(1); //quand le booléen retourne 'true' ou 1, le produit est en solde
            $table->string('reference',16);
            $table->foreignId('categories_id')->nullable()->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade'); //je crée une relation entre cette table et la table categories via cette clé étrangère.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
