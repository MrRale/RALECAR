<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Http\Requests\StoreShoppingCartRequest;
use App\Http\Requests\UpdateShoppingCartRequest;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    
    public function cesta(){
        return view('paginas.cesta');
    }
    public function actualizar(Request $request){
             
        $carrito = ShoppingCart::get_the_session_shopping_cart();
        
        foreach($carrito->shopping_cart_details as $key => $scd){
           
            $scd->update([
                "cantidad"=>$request->cantidad[$key]
            ]);
        }
        return back();
    }

    public function index()
    {
        //
    }

  
    public function create()
    {
        //
    }

    public function store(StoreShoppingCartRequest $request)
    {
        //
    }

 
    public function show(ShoppingCart $shoppingCart)
    {
        //
    }

  
    public function edit(ShoppingCart $shoppingCart)
    {
        //
    }


    public function update(Request $request)
    {
        //
    }

   
    public function destroy(ShoppingCart $shoppingCart)
    {
        //
    }
}
