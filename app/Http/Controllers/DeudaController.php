<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Deuda;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Models\AbonoProveedor;
use RealRashid\SweetAlert\Facades\Alert;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class DeudaController extends Controller
{
 
    public function index()
    {
        $deudas = Deuda::where('saldo','<>','0')->get();
        $total = 0;
        $deudas = Deuda::all();
        foreach($deudas as $deuda){
            $total = $total + $deuda->saldo;
        }

      return view('paginas.admin.deuda.listar',compact('deudas','total'));
    }

    public function eliminarDeuda($id){
        Deuda::destroy($id);
        return back();
    }

    public function deudasByProveedor($id){
      $deudas = Deuda::where('proveedor_id',$id)->get();
      $total = 0;
      foreach($deudas as $deuda){
        $total = $total + $deuda->saldo;
    }

      return view('paginas.admin.deuda.listar',compact('deudas','total'));
    }
 
   public function abonarDeuda($id){
        $deuda = Deuda::find($id);
        return view('paginas.admin.deuda.abonarProveedor',compact('deuda'));
   }

   public function guardarAbono(Request $request){
    $deuda= Deuda::find($request['deuda_id']);
       if($request['abono']>$deuda->saldo){
        Alert::toast('El valor a abonar no debe superar el saldo pendiente', 'info');
           return back();
       }
        $saldo = $deuda->saldo;
        $saldo=$saldo-$request["abono"];
        $deuda->update([
            "saldo"=>$saldo,
        ]);

       $abonoProveedor= AbonoProveedor::create([
            "monto"=>$request["abono"],
            "fecha"=>Carbon::now(),
            "deuda_id"=>$deuda->id
        ]);

        if($request->hasFile('imagen')){
            $url = "";
            $file = $request['imagen'];
            $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'abonosProveedor']);
            $public_id = $elemento->getPublicId();
            $url = $elemento->getSecurePath();

            $abonoProveedor->image()->create([
                "url" => $url,
                "public_id" => $public_id
            ]);
        }

        Alert::toast('Abono realizado con exito', 'success');
        return redirect()->route('deuda.index');
   }

   public function verAbonos($id){//id de la deuda
    $abonos = AbonoProveedor::where('deuda_id',$id)->get();
    $deuda = Deuda::find($id);
    return view('paginas.admin.deuda.abonos',compact('abonos','deuda'));
   }


    public function create()
    {
        $proveedores = Proveedor::all();
        return view('paginas.admin.deuda.agregar',compact('proveedores'));
    }

  
    public function store(Request $request)
    {
       // $request = $request->except('_token');
        Deuda::create([
            "saldo"=>$request->saldo,
            "fecha"=>Carbon::now(),
            "proveedor_id"=>$request->proveedor_id
        ]);
        Alert::toast('Deuda creada', 'success');
        return back();
    }

    public function show()
    {
        $deudas = Deuda::where('saldo','=','0')->get();
      return view('paginas.admin.deuda.deudasCanceladas',compact('deudas'));
    }

   
    public function edit($id)
    {
        $deuda = Deuda::findOrFail($id);
        $proveedores = Proveedor::all();
        return view('paginas.admin.deuda.editar', compact('deuda','proveedores'));
    }

  
    public function update(Request $request, $id)
    {
        $deuda = Deuda::findOrFail($id);
        $request = $request->except(['_token', '_method']);
        $deuda->update([
            "saldo" => $request['saldo'],
            "fecha" => Carbon::now(),
            "proveedor_id"=>$request['proveedor_id'],
        ]);

        Alert::toast('Deuda editada', 'success');
        return redirect()->route('deuda.index');
    }

 
    public function destroy($id)
    {
          Deuda::destroy($id);
        Alert::toast('Deuda eliminada', 'success');
        return back();
    }
}
