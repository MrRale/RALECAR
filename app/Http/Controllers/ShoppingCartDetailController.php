<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCartDetail;
use App\Http\Requests\StoreShoppingCartDetailRequest;
use App\Http\Requests\UpdateShoppingCartDetailRequest;
use App\Models\Producto;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ShoppingCartDetailController extends Controller
{
  
    public function store(Request $request)
    {  
        $producto = Producto::find($request['producto_id']);
        if($request->cantidad > $producto->stock){
            return back()->with('mensaje2','Al momento no se cuenta con la cantidad de productos especificada.');
        }
     
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $shopping_cart->my_store($producto, $request);
        Alert::toast('Producto agregado al carrito','success');
        return back();
    }

    public function retirar(ShoppingCartDetail $scd){
        ShoppingCartDetail::destroy($scd->id);
        Alert::toast('Producto retirado del carrito de compra', 'success');
        return back();
    }

    public function update(Request $request, ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }

  
    public function destroy(ShoppingCartDetail $shoppingCartDetail)
    {
        dd($shoppingCartDetail);
        // ShoppingCartDetail::destroy($shoppingCartDetail->id);
        // Alert::toast('Producto retirado del carrito de compra', 'success');
        // return back();
    }
}
