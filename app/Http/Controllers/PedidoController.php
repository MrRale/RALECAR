<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;

class PedidoController extends Controller
{
   
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

  
    public function store(StorePedidoRequest $request)
    {
        //
    }

    
    public function show(Pedido $pedido)
    {
        $pedidos = $pedido->detalle_pedidos()->get();
        return view('paginas.detallepedido', compact('pedidos'));
    }

    
    public function edit(Pedido $pedido)
    {
        //
    }

    
    public function update(UpdatePedidoRequest $request, Pedido $pedido)
    {
        //
    }

    
    public function destroy(Pedido $pedido)
    {
        //
    }
}
