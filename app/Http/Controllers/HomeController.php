<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Mensaje;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        $productosdestacados = Producto::withCount(['ratings as average_rating' => function($query){
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])->orderByDesc('average_rating')->take(8)->get();

        return view('paginas.index', compact('productos','categorias','productosdestacados'));
    }

    public function tienda(){
         // Agrupamos los anuncios por categoria
         $productoscount = Producto::select(DB::raw('count(*) as producto_count, categoria_id'))
         ->groupBy('categoria_id')
         ->get();
        $productos = Producto::paginate(15);
        // $productosdestacados = Producto::take(9)->get();
        return view('paginas.tienda', compact('productos','productoscount'));
    }

    public function nosotros(){
        return view('paginas.nosotros');
    }

    public function contactanos(){
        return view('paginas.contactanos');
    }

    public function contactanos_mensaje(Request $request){
        $request = $request->except('_token');
        Mensaje::create($request);
        return back()->with('mensaje','Mensaje enviado');
    }

    public function filtrado(Request $request){
        $codigo = $request->get('codigo');
        $productos = Producto::codigos($codigo)->paginate(2);
        $productoscount = Producto::select(DB::raw('count(*) as producto_count, categoria_id'))
        ->groupBy('categoria_id')->get();
        return view('paginas.tienda', compact('productos','productoscount'));
    }

    public function filtradoCategoriaSidebar($id){
        $productos = Producto::categorias($id)->paginate(2);
        $productoscount = Producto::select(DB::raw('count(*) as producto_count, categoria_id'))
        ->groupBy('categoria_id')->get();
        return view('paginas.tienda', compact('productos','productoscount'));
    }

    public function filtradoPrecioSidebar(Request $request){
        
        $precio = $request->get('precio');
        $productos = Producto::precios($precio)->paginate(2);
        $productoscount = Producto::select(DB::raw('count(*) as producto_count, categoria_id'))
        ->groupBy('categoria_id')->get();
        return view('paginas.tienda', compact('productos','productoscount'));
    }

    public function ordenarProductos(Request $request){
        switch($request['orden']){
            case('1'): //default
                return back();
            break;
            case('2'): //A-Z
                $productos = Producto::orderBy('nombre','asc')->paginate(2);
            break;
            case('3'): //Z-A
                $productos = Producto::orderBy('nombre','desc')->paginate(2);
            break;
            case('4'): //LOW TO HIGH
                $productos = Producto::orderBy('precio','asc')->paginate(2);
            break;
            case('5'): //HIGH TO LOW
                $productos = Producto::orderBy('precio','desc')->paginate(2);
            break;
            default: //
            return back();
        }

        
        $productoscount = Producto::select(DB::raw('count(*) as producto_count, categoria_id'))
        ->groupBy('categoria_id')->get();
        return view('paginas.tienda', compact('productos','productoscount'));
    }

    public function detalle(Producto $producto){
        return view('paginas.detalleproducto', compact('producto'));
    }
}
