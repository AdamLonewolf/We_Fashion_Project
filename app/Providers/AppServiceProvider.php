<?php

namespace App\Providers;
use App\Http\view\headerComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       
        //Le contenu de mes variables dans la fonction composer du fichier headercomposer va apparaître sur toutes les pages
        
        view()->composer("*", headerComposer::class); 

         //Je choisis la version Bootstrap 5 pour ma pagination

         Paginator::useBootstrapFour();
    }
}
