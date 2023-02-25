<?php

namespace App\Http\view;
use App\Models\Category;
use Illuminate\View\View;

Class headerComposer{

    public function compose(View $view){
        $categoryall = Category::all();
        $view->with("categoryall", $categoryall);
    }

}


?>