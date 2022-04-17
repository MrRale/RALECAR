<?php

namespace App\Http\Controllers;

use App\Models\Deseado;
use App\Models\Producto;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class DeseadoController extends Controller
{
  
    public function index()
    {
        $deseados = Deseado::where('user_id',Auth::id())->get();

        $productos = collect(new Producto);
       foreach($deseados as $deseado){
           $producto = Producto::where('id',$deseado->producto_id)->first();
        $productos->push($producto);
       }
    //    dd($productos);
        return view('paginas.deseados',compact('productos'));
    }

    public function eliminar($id){
        $deseado = Deseado::where('producto_id',$id)->first();
        Deseado::destroy($deseado->id);
        return back();
    }

    public function agregarCarrito(Request $request){
        // dd($request);
        $producto = Producto::find($request['producto_id']);
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $shopping_cart->my_store($producto, $request);

        $deseado= Deseado::where('producto_id',$request["producto_id"])->first();
        $deseado->delete();
        Alert::toast('Producto agregado al carrito','success');
        return back();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
      Deseado::create([
          "user_id"=>Auth::id(),
          "producto_id"=>$request["producto_id"]
      ]);

      return back();
    }

    public function show(Deseado $deseado)
    {
        //
    }

  
    public function edit(Deseado $deseado)
    {
        //
    }

    public function update(Request $request, Deseado $deseado)
    {
        //
    }

 
    public function destroy(Deseado $deseado)
    {
        //
    }
}
