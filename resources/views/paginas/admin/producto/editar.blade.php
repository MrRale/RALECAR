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
       Editar producto
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar producto</li>
        </ol>
    </nav>
  </div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Editar producto</h4>
        <p class="card-description">
          
        </p>
        
        <form class="forms-sample" enctype="multipart/form-data" action="{{url('/admin/producto/'.$producto->id)}}" method="POST">
          {{method_field('PATCH')}}
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="exampleInputName1" value="{{$producto->nombre}}" placeholder="nombre">
          </div>

                    <div class="form-group">
            <label for="codigo">Código</label>
            <input name="codigo" type="text" class="form-control" value="{{$producto->codigo}}" id="exampleInputName1" placeholder="codigo">
          </div>

          <div class="form-group">
            <label for="codigo">Stock</label>
            <input name="stock" type="number" class="form-control" value="{{$producto->stock}}" id="exampleInputName1" placeholder="stock">
          </div>


          <div class="form-group">
            <label for="exampleTextarea1">Descripción</label>
            <textarea name="descripcion" class="form-control"  id="exampleTextarea1" rows="4">{{ old('descripcion', $producto->descripcion) }}</textarea>
          </div>
        
        
          <div class="form-group">
            <label for="exampleInputName1">Marca</label>
            <input name="marca" type="text" class="form-control" id="exampleInputName1" value="{{$producto->marca}}" placeholder="marca">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Cantidad</label>
            <input name="cantidad" type="number" class="form-control" id="exampleInputName1" value="{{$producto->cantidad}}" placeholder="cantidad">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Precio</label>
            <input name="precio" type="number" class="form-control" step="0.01" id="exampleInputName1" value="{{$producto->precio}}" placeholder="precio">
          </div>
          
          <label for="exampleInputEmail3">Imagenes</label>
          <div class="imagenes" style="display:flex; flex-direction:row; justify-content:space-around;">
            @foreach($producto->images as $imagen)
            <div class="form-group">
              
                <img style="height:100px;" src="{{$imagen->url}}" alt="foto de imagen">
            
              
            </div>
  @endforeach
          </div>

       <div class="form-group">
            <label for="image">Agregar otra imagen</label>
            <input name="image" type="file" class="form-control" id="image">
       </div>
  <div class="form-group">
          <select class="category form-control" name="categoria_id">
            <option label="Select Option"></option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}"
                    {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                   {{ $categoria->nombre }}</option>
            @endforeach
       </select>
       </div>
  <div class="form-group">
           <select class="category form-control" name="inventario_id">
            <option label="Select Option"></option>
            @foreach ($inventarios as $inventario)
                <option value="{{ $inventario->id }}"
                    {{ old('inventario_id', $producto->inventario_id) == $inventario->id ? 'selected' : '' }}>
                   {{ $inventario->nombre }}</option>
            @endforeach
       </select>
  </div>
          <button type="submit" class="btn btn-primary mr-2">Guardar cambios</button>
          <button class="btn btn-light">Cancelar</button>
        </form>
      </div>
    </div>
  </div>

@endsection