<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProveedorController extends Controller
{

    public function index()
    {
        $proveedores = Proveedor::all();
        return view('paginas.admin.proveedor.listar',compact('proveedores'));
    }

 
    public function create()
    {
        return view('paginas.admin.proveedor.agregar');
    }


    public function store(Request $request)
    {
        $request = $request->except('_token');
        Proveedor::insert($request);
        Alert::toast('Proveedor agregado', 'success');
        return back();
    }

  
    public function show(Proveedor $proveedor)
    {
        
    }


    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('paginas.admin.proveedor.editar', compact('proveedor'));
    }

  
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:30',
            'empresa' => 'required|string|max:40',
            'direccion' => 'required|string|max:40',
            'telefono'=>'required|max:10|min:10'
            
        ];
        $mensaje = [
            'required' => ':attribute es requerido',
            'nombre.max' => 'El nombre no debe sobrepasar los 30 caracteres',
            'empresa.max' => 'La empresa no debe sobrepasar los 30 caracteres',
            'nombre.required' => 'El nombre es requerido',
            'empresa.required' => 'La empresa es requerida',
            'direccion.required' => 'La dirección es requerida',
            'telefono.required' => 'El telefono es requerido',
            'telefono.min' => 'El teléfono no debe tener menos de 10 dígitos',
            'telefono.max' => 'El teléfono no debe tener mas de 30 dígitos',
        ];
        $this->validate($request, $campos, $mensaje);

        $categoria = Proveedor::findOrFail($id);
        $request = $request->except(['_token', '_method']);
        $categoria->update([
            "nombre" => $request['nombre'],
            "empresa" => $request['empresa'],
            "telefono"=>$request['telefono'],
            "direccion"=>$request['direccion']
        ]);


        // Categoria::where('id', '=', $categoria->id)->update($request);
        Alert::toast('Proveedor editado', 'success');
        return redirect()->route('proveedor.index');
    }

  
    public function destroy($id)
    {
        // dd("hola");
        Proveedor::destroy($id);
        Alert::toast('Proveedor eliminado', 'success');
        return back();
    }
}
