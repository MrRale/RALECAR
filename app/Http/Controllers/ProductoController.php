<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Inventario;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductoController extends Controller
{
    
    public function index()
    {
        $productos = Producto::all();
        return view('paginas.admin.producto.listar',compact('productos'));
    }

    public function filtrarProductos(Request $request){
        $productos = Producto::where('stock','<=',$request['cantidad'])->get();
        return view('paginas.admin.filtros.productosByInventario',compact('productos'));
    }
    public function filtrarProductos2(Request $request){
        $productos = Producto::where('stock','<=',$request['cantidad'])->get();
        return view('paginas.admin.producto.listar',compact('productos'));
    }

    public function productosByCategoriaInventario(Request $request){
        if(!$request->inventario_id){
            Alert::toast('Especifique el inventario por el que quiere filtrar el producto','info');
            return back();
        }
    
        $productos = Producto::where('categoria_id',$request->categoria_id)
                                ->where('inventario_id',$request->inventario_id)
                                ->get();
            return view('paginas.admin.filtros.productosByCategoriaInventario', compact('productos'));

    }
    public function productosByCategoria($id){
        $productos = Producto::where('categoria_id',$id)->get();
        return view('paginas.admin.filtros.productosByCategoria', compact('productos'));
    }

    public function productosByInventario($id){
        $productos = Producto::where('inventario_id',$id)->get();
        return view('paginas.admin.filtros.productosByInventario', compact('productos'));
    }

   
    public function create()
    {
        //
        $categorias = Categoria::all();
        $inventarios = Inventario::all();
        return view('paginas.admin.producto.agregar', compact('categorias','inventarios'));
    }

  
    public function store(Request $request)
    {

        if(request()->hasFile('images')){
            $campos = [
                'imagen' => 'max:1000|mimes:jpeg,png,jpg',
            ];
            $mensaje = [
                'imagen.mimes'=>'La imagen debe ser jpg, png o jpeg',
                'imagen.max'=>'La imagen es muy pesada',
            ];
            $this->validate($request, $campos, $mensaje);
        }


        $campos = [
            'nombre' => 'required|string|max:50',
            'marca' => 'max:30',
            'stock' => 'required|numeric|min:1',
            'descripcion' => 'max:256',
            'codigo'=>'required|string|max:15',
            'precio'=>'required|numeric|min:0.01',
            'imagen' => 'max:1000|mimes:jpeg,png,jpg',
            'categoria_id'=>'required',
            'inventario_id'=>'required'
        ];
        $mensaje = [
            'required' => ':attribute es requerido',
            'nombre.max'=>'El nombre no debe sobrepasar los 50 caracteres',
            'marca.max'=>'La marca no debe sobrepasar los 30 caracteres',
            'stock.min'=>'El stock no debe tener al menos 1 producto',
            'codigo.max'=>'El codigo no debe tener mas de 15 digitos',
            'precio.min'=>'El precio debe tener un valor mayor a cero',
            'imagen.mimes'=>'La imagen debe ser jpg, png o jpeg',
            'imagen.max'=>'La imagen es muy pesada',
            'descripcion.max'=>'La descripción debe tener un máximo de 256 caracteres',
            'categoria_id.required'=>'La categoría es requerida',
            'inventario_id.required'=>'El inventario es requerido',

        ];
        $this->validate($request, $campos, $mensaje);

        $request = $request->except('_token');
        $producto =  Producto::create([
            "nombre" => $request['nombre'],
            "marca" => $request['marca'],
            "stock"=>$request['stock'],
            "descripcion" =>$request['descripcion'],
            "codigo" =>$request['codigo'],
            "precio" => $request['precio'],
            "categoria_id" =>$request['categoria_id'],
            "inventario_id" =>$request['inventario_id']
        ]);
       

       $this->upload_file($request,$producto);
       Alert::toast('Producto agregado', 'success');
       return redirect()->route('producto.index');
    }


    public function editarProducto(Request $request){
      
        $producto = Producto::findOrFail($request->id);
        $request = $request->except(['_token']);
        $producto->update([
            "nombre"=>$request['nombre'],
            "descripcion"=>$request['descripcion'],
            "stock"=>$request['stock'],
            "precio"=>$request['precio'],
            "codigo"=>$request['codigo'],
            "categoria_id"=>$request['categoria_id'],
            "inventario_id"=>$request['inventario_id'],
            "marca"=>$request['marca']
        ]);
        //relacionamos la nueva imagen que añadio
        $this->upload_image($request, $producto);
        return redirect()->route('producto.index')->with('mensaje','Producto actualizado');
    }

    public function upload_file($request , $producto){
        $urlimages = [];
        $request = request()->except('_token');
        if(request()->hasFile('images')){
            $images = request()->file('images');
           
            foreach($images as $image){
                     $elemento = Cloudinary::upload($image->getRealPath(),['folder'=>'productos']);
              $public_id = $elemento->getPublicId();
              $url = $elemento->getSecurePath();
               $producto->images()->create([
                  'url'=>$url,
                  'public_id'=>$public_id
                  ]);
            
                
                
            }//fin foreach
            
        }
        // $producto->images()->createMany($urlimages);
    }


    public function edit(Producto $producto)
    {
        
        // $producto = Producto::findOrFail($producto->get('id'))->first();
        // dd($producto);
        $categorias = Categoria::all();
        $inventarios = Inventario::all();
        return view('paginas.admin.producto.editar', compact('producto','categorias','inventarios'));
    }

  
    public function update(Request $request, Producto $producto)
    {

        if(request()->hasFile('image')){
            $campos = [
                'image' => 'max:1000|mimes:jpeg,png,jpg',
            ];
            $mensaje = [
                'image.mimes'=>'La imagen debe ser jpg, png o jpeg',
                'image.max'=>'La imagen es muy pesada',
            ];
            $this->validate($request, $campos, $mensaje);
        }
        
        $campos = [
            'nombre' => 'required|string|max:50',
             'marca' => 'max:30',
            'stock' => 'required|numeric|min:1',
            'descripcion' => 'max:256',
            'codigo'=>'required|string|max:15',
            'precio'=>'required|numeric|min:0.01',
            'categoria_id'=>'required',
            'inventario_id'=>'required'
        ];
        $mensaje = [
            'required' => ':attribute es requerido',
            'nombre.max'=>'El nombre no debe sobrepasar los 50 caracteres',
             'marca.max'=>'La marca no debe sobrepasar los 30 caracteres',
            'stock.min'=>'El stock no debe tener al menos 1 producto',
            'codigo.max'=>'El codigo no debe tener mas de 15 digitos',
            'precio.min'=>'El precio debe tener un valor mayor a cero',
            'descripcion.max'=>'La descripción debe tener un máximo de 256 caracteres',
            'categoria_id.required'=>'La categoría es requerida',
            'inventario_id.required'=>'El inventario es requerido',
        ];
        $this->validate($request, $campos, $mensaje);


        $request= $request->except('_token');
        $producto->update([
            "nombre"=>$request['nombre'],
            "descripcion"=>$request['descripcion'],
            "stock"=>$request['stock'],
            "precio"=>$request['precio'],
            "codigo"=>$request['codigo'],
            "categoria_id"=>$request['categoria_id'],
            "inventario_id"=>$request['inventario_id'],
            "marca"=>$request['marca']
        ]);
        if(request()->hasFile('image')){
        //relacionamos la nueva imagen que añadio
        $this->upload_image($request, $producto);
        }
        Alert::toast('Producto editado', 'success');

        return redirect()->route('producto.index')->with('mensaje','Producto actualizado con exito!');
    }

    public function upload_image($request, $producto){
      
        $extension = request()->file('image')->extension();
        if ($extension == "png" || $extension == "jpg" || $extension == "jpeg") {
            $file = request()->file('image');
            // $this->validate($request, [
            //     'image'   => 'required',
            //     'image' => 'image|mimes:png,jpg,jpeg|max:1000',
            // ],[
            //     'image.required'=>'La imagen es requerida',
            //     'image.image'=>'El archivo tienen que ser una imagen',
            //     'image.mimes'=>'La imagen debe ser tipo png, jpg o jpeg',
            //     'image.max'=>'La imagen supera el peso permitido (1Megabyte)'
            // ]);

            $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'productos']);
            $public_id = $elemento->getPublicId();
            $url = $elemento->getSecurePath();
            $producto->images()->create([
                'url' => $url,
                'public_id'=>$public_id
            ]);
        
        }
    
}

    public function destroy(Producto $producto)
    {
        Producto::destroy($producto->id);
        Alert::toast('Producto eliminado', 'success');
        return back()->with('mensaje','Producto eliminado');
    }
}
