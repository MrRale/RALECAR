<?php

namespace App\Providers;

use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class ShoppingCartProvider extends ServiceProvider
{
   
    public function register()
    {
        //
    }

    public function boot()
    {
        
        view()->composer("*", function($view){

            $session_name = 'shopping_cart_id';//nombre de la session
            if(Auth::check()){
                // dd("si");
                $session_name = 'shopping_cart_id';//nombre de la session
                $shopping_cart = ShoppingCart::get_the_user_shopping_cart(); 
              
               Session::put($session_name, $shopping_cart->id);//se le asigna a la sesion el nombre y el id del shopping cart creado
                $view->with('shopping_cart',$shopping_cart); //las vistas pueden obtener la data del shopping cart con la palabra shopping_cart           
            }else{
                $session_name = 'shopping_cart_id';//nombre de la session
              $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        Session::put($session_name, $shopping_cart->id);//se le asigna a la sesion el nombre y el id del shopping cart creado
        $view->with('shopping_cart',$shopping_cart); //las vistas pueden obtener la data del shopping cart con la palabra shopping_cart           
            }
        });



          
      
    }
}
