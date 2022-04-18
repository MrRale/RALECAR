<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Deuda;
use App\Models\Orden;
use App\Models\Pedido;
use App\Models\Empresa;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        $productos = Producto::paginate(15);
        $categorias = Categoria::all();
        $empresa = Empresa::first();


        $deudas = Deuda::all();
        $clientes = User::role('Cliente')->get();
        $clientes_count = $clientes->count();
        $miembros = User::role(['Vendedor', 'Administrador'])->get();
        $miembros_count = $miembros->count();
        $user_count = User::count();
        $productos_count = Producto::count();

        $date = Carbon::now(); //obtenemos la fecha actual
        $n = intval($date->format('m')); //extraemos el numero del mes actual

        $totalesOrden = collect(); //creamos una coleccion para almacenar las ganancias de cada messages
        for ($i = 1; $i <= $n; $i++) { // un for para iterar hasta el mes actual
            //consulta de las ganancias obtenidas por el mes de iteracion y agrupado por mes actual
            $total =  DB::table('ordens')->select(DB::raw('sum(total_pagar) as total,fecha'))
                ->whereMonth('fecha', $i)->where('estado_pedido', 'entregado')->groupBy('fecha')->get();
            $res = 0;
            //iteramos cada objeto de ordenes obtenidas con el fin de sumar sus totales
            foreach ($total as $t) {
                $res = $res + $t->total;
            }
            //almacenamos el total de cada orden por mes en la coleccion totalOrden
            $totalesOrden[$i] = $res;
        }

        $totalesPedido = collect(); //creamos una coleccion para almacenar las ganancias de cada mes
        for ($i = 1; $i <= $n; $i++) { // un for para iterar hasta el mes actual
            //consulta de las ganancias obtenidas por el mes de iteracion y agrupado por mes actual
            $total =  DB::table('pedidos')->select(DB::raw('sum(total) as total,fecha'))
                ->whereMonth('fecha', $i)->where('estado_pedido', 'entregado')->groupBy('fecha')->get();
            $res = 0;
            //iteramos cada objeto de ordenes obtenidas con el fin de sumar sus totales
            foreach ($total as $t) {
                $res = $res + $t->total;
            }
            //almacenamos el total de cada orden por mes en la coleccion totalOrden
            $totalesPedido[$i] = $res;
        }

        $ordenespendientes = Orden::where('estado_pedido', 'pendiente')->get();
        $pedidospendientes = Pedido::where('estado_pedido', 'pendiente')->get();
        $ordenespendientes_count = $ordenespendientes->count();
        $pedidospendientes_count = $pedidospendientes->count();
        $ordenespendientes_count = $ordenespendientes_count + $pedidospendientes_count;


        //almacenamos en ganancia la suma de los totales entre ordenes y pedidos de ese mes
        $ganancia = $totalesPedido[$n] + $totalesOrden[$n];


        $deudatotal = 0;
        foreach ($deudas as $deuda) {
            $deudatotal = $deudatotal + $deuda->saldo;
        }


        view()->share([
            'productos' => $productos,
            'categorias' => $categorias,
            'empresa' => $empresa,
            'deudatotal' => $deudatotal,
            'user_count' => $user_count,
            'ganancia' => $ganancia,
            'ordenespendientes_count' => $ordenespendientes_count,
            'productos_count' => $productos_count,
            'clientes_count' => $clientes_count,
            'miembros_count' => $miembros_count
        ]);
    }
}
