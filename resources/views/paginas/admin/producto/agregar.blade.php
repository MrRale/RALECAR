@extends('paginas.admin.dashboard')

@section('contenido')
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif
<div class="page-header">
    <h3 class="page-title">
       Agregar producto
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar producto</li>
        </ol>
    </nav>
  </div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Agregar producto</h4>
        <p class="card-description">
          
        </p>
        
        <form class="forms-sample" action="{{route('producto.store')}}" method="POST" enctype = "multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="exampleInputName1" placeholder="nombre">
          </div>

          <div class="form-group">
            <label for="codigo">Código</label>
            <input name="codigo" type="text" class="form-control" id="exampleInputName1" placeholder="codigo">
          </div>

          <div class="form-group">
            <label for="codigo">Stock</label>
            <input name="stock" min="1"  type="number" class="form-control" id="exampleInputName1" placeholder="stock">
          </div>

        

          <div class="form-group">
            <label for="exampleTextarea1">Descripción</label>
            <textarea name="descripcion" class="form-control" id="exampleTextarea1" rows="4"></textarea>
          </div>
        
          <div class="form-group">
            <label for="exampleInputName1">Marca</label>
            <input name="marca" type="text" class="form-control" id="exampleInputName1" placeholder="marca">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Precio</label>
            <input name="precio" min="0.01" type="number" class="form-control" step="0.01" id="exampleInputName1" placeholder="precio">
          </div>
        
          <div class="form-group">
            <label for="exampleInputEmail3">Imagen</label>
            <input name="images[]" type="file" class="form-control" id="images" multiple required>
          </div>

       
                <div class="form-group">
                  <label>Seleccione una categoría</label>
                  <select class="js-example-basic-single w-100" name="categoria_id">
                      @foreach ($categorias as $c)
                      <option value="{{$c->id}}">{{$c->nombre}}</option>
                      @endforeach
                    
               
                
                  </select>
                </div>

                        <div class="form-group">
                  <label>Seleccione un inventario</label>
                  <select class="js-example-basic-single w-100" name="inventario_id">
                      @foreach ($inventarios as $i)
                      <option value="{{$i->id}}">{{$i->nombre}}</option>
                      @endforeach
                    
               
                
                  </select>
                </div>
  
          <button type="submit" class="btn btn-primary mr-2">Enviar</button>
          <button class="btn btn-light">Cancelar</button>
        </form>
      </div>
    </div>
  </div>

@endsection