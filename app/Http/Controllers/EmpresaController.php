<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Alert;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

  
    public function show(Empresa $empresa)
    {
        //
    }

    public function guardarDatos(Request $request){
      $empresa =  Empresa::first();
      $empresa->update([
          "nombre"=>$request->nombre,
          "iva"=>$request->iva,
          "telefono"=>$request->telefono,
          "telefono2"=>$request->telefono2,
          "correo"=>$request->correo
      ]);

      $empresa->save();

      Alert::toast('Datos actualizados con éxito', 'success');
      return back();
    }

    public function editar(){
        $empresa =  Empresa::first();
        return view('paginas.admin.empresa.editar',compact('empresa'));
    }
  
    public function edit()
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
