<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Http\Requests\StoreInventarioRequest;
use App\Http\Requests\UpdateInventarioRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InventarioController extends Controller
{
    
    public function index()
    {
        //
        $inventarios = Inventario::all();
    
        return view('paginas.admin.inventario.listar', compact('inventarios'));
    }

   
    public function create()
    {
        //
        return view('paginas.admin.inventario.agregar');
    }

 
    public function store(Request $request)
    {
        
        $campos = [
            'nombre' => 'required|string|max:50',
        ];
        $mensaje = [
            'required' => ':attribute es requerido',
            'nombre.max'=>'El nombre no debe sobrepasar los 50 caracteres',
        ];

        $this->validate($request, $campos, $mensaje);


        $request = $request->except("_token");
        Inventario::create($request);
        Alert::toast('Inventario agregado', 'success');
        return redirect()->route('inventario.index')->with('mensaje','Inventario agregado');
    }

 
    public function show(Inventario $inventario)
    {
        //
    }

    public function edit(Inventario $inventario)
    {
        //
        return view('paginas.admin.inventario.editar', compact('inventario'));
    }

  
    public function update(Request $request, Inventario $inventario)
    {

        $campos = [
            'nombre' => 'required|string|max:50',
        ];
        $mensaje = [
            'required' => ':attribute es requerido',
            'nombre.max'=>'El nombre no debe sobrepasar los 50 caracteres',
        ];

        $this->validate($request, $campos, $mensaje);


        $request= $request->except('_token');
        $inventario->update([
            "nombre"=>$request['nombre']
        ]);
       
        Alert::toast('Inventario editado', 'success');
        return redirect()->route('inventario.index');
    }


    public function destroy(Inventario $inventario)
    {
        //
        Inventario::destroy($inventario->id);
        Alert::toast('Inventario eliminado', 'success');
        return back();
    }
}
