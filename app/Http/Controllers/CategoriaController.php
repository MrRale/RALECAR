<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;



class CategoriaController extends Controller
{

    public function index()
    {
        $categorias =  Categoria::all();
        $inventarios = Inventario::all();
        return view('paginas.admin.categoria.listar', compact('categorias', 'inventarios'));
    }

    public function create()
    {
        return view('paginas.admin.categoria.agregar');
    }


    public function store(Request $request)
    {
    
        $campos = [
            'nombre' => 'required|string|max:30',
            'descripcion' => 'required|string|max:256',
            'imagen' => 'required|max:1000|mimes:jpeg,png,jpg',
        ];

        $mensaje = [
            'required' => ':attribute es requerido',
            'nombre.max' => 'El nombre no debe sobrepasar los 30 caracteres',
            'descripcion.max' => 'La descripcion no debe sobrepasar los 256 caracteres',
            'imagen.required' => 'La imagen es requerida',
            'imagen.mimes' => 'La imagen debe ser jpg, png o jpeg',
            'imagen.max' => 'La imagen es muy pesada',
            'descripcion.required' => 'La descripción es requerida',
        ];

        $this->validate($request, $campos, $mensaje);

        if ($request->hasFile('imagen')) {
            $url = "";
            $file = $request['imagen'];
            $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'categorias']);
            $public_id = $elemento->getPublicId();
            $url = $elemento->getSecurePath();
        }

        $categoria = Categoria::create([
            'nombre' => $request['nombre']
        ]);
        $categoria->image()->create([
            "url" => $url,
            "public_id" => $public_id
        ]);

        // Categoria::create($datosCategoria);
        Alert::toast('Categoría agregada', 'success');

        return redirect()->route('categoria.index');
    }






    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('paginas.admin.categoria.editar', compact('categoria'));
    }


    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:30',
            'descripcion' => 'required|string|max:256',
            'imagen' => 'required|max:1000|mimes:jpeg,png,jpg',
        ];
        $mensaje = [
            'required' => ':attribute es requerido',
            'nombre.max' => 'El nombre no debe sobrepasar los 30 caracteres',
            'descripcion.max' => 'La descripcion no debe sobrepasar los 256 caracteres',
            'imagen.required' => 'La imagen es requerida',
            'imagen.mimes' => 'La imagen debe ser jpg, png o jpeg',
            'imagen.max' => 'La imagen es muy pesada',
            'descripcion.required' => 'La descripción es requerida',
        ];
        $this->validate($request, $campos, $mensaje);

        $categoria = Categoria::findOrFail($id);
        $request = $request->except(['_token', '_method']);
        $categoria->update([
            "nombre" => $request['nombre'],
            "descripcion" => $request['descripcion'],
        ]);



        if (request()->hasFile('imagen')) {
            $url="";
          $file = $request['imagen'];
              $elemento= Cloudinary::upload($file->getRealPath(),['folder'=>'categorias']);
              $public_id = $elemento->getPublicId();
              $url = $elemento->getSecurePath();
        if(is_null($categoria->image)){
              $categoria->image()->create([
                  'url'=>$url,
                  'public_id'=>$public_id
                  ]);
        }else{
              $pid = $categoria->image->public_id;
              Cloudinary::destroy($pid);//Eliminamos la imagen anterior de cloud
              $categoria->image()->update([
                  'url'=>$url,
                  'public_id'=>$public_id
                  ]);
        }
        }
        // Categoria::where('id', '=', $categoria->id)->update($request);
        Alert::toast('Categoría editada', 'success');
        return redirect()->route('categoria.index');
    }



    public function destroy($id)
    {
        Categoria::destroy($id);
        Alert::toast('Categoría eliminada', 'success');
        return back();
    }
}
