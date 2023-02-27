<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

//Il s'agit du controller qui va gérer toutes les authentifications
class AuthController extends Controller
{
    
    /**
     * Cette fonction retourne la vue "login.blade.php"
     */
    public function login(){
        return view('auth.login');
    }

    /**
     * Cette fonction va nous permettre d'authentifier l'utilisateur
     */
    public function authenticate(Request $request){

            //Critères de validation du formulaire

            $request->validate([
                'email' =>['required','email','max:255'],
                'password' =>'required'
            ]);

            //Filtre qui va récupérer que les infos de ces deux champs dans le formulaire

            $credentials = $request->only('email','password'); 

            //connecte l'utilisateur en créant une session utilisateur et en stockant l'ID de l'utilisateur dans la session.

           if(auth()->attempt($credentials)){
                $user = auth()->user();

                //L'utilisateur a le role admin
                if($user->role === 'admin'){
                    return redirect()->route('dashboard');
                } else {
                    //L'utilisateur a le role Utilisateur
                    return redirect()->route('home');
                }

           } else {
            //retourne des erreurs si un champ est mal renseigné
            return redirect()->back()->withErrors('Les identifiants sont incorrects.');
           }
    }

    /**
     * Cette fonction va nous permettre de se déconnecter
     */
    public function logout(){
        auth()->logout(); //va supprimer l'ID de session de l'utilisateur.
        return redirect()->route('home');
    }

    /**
     * Cette fonction va permettre de créer un utilisateur et de stocker ses données dans la bdd
     */

     public function register(Request $request){
        $request->validate([
            'name'=>['required','max:255'],
            'email' =>['required','email','max:255'],
            'password' =>'required', 
        ]);        

       $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        auth()->login($user); //Une fois le compte crée, l'utilisateur est connecté automatiquement

        return redirect()->route('home');
     }
}
