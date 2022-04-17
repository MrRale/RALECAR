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
       Agregar proveedor
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar proveedor</li>
        </ol>
    </nav>
  </div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Agregar proveedor</h4>
        <p class="card-description">
          
        </p>
        <form class="forms-sample" action="{{route('proveedor.store')}}" method="POST" >
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="exampleInputName1" placeholder="nombre">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Empresa</label>
            <input name="empresa" type="text" class="form-control" id="exampleInputName1" placeholder="empresa">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Teléfono</label>
            <input name="telefono" type="text" class="form-control" id="exampleInputName1" placeholder="telefono">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Dirección</label>
            <input name="direccion" type="text" class="form-control" id="exampleInputName1" placeholder="dirección">
          </div>     
         
       
          <button type="submit" class="btn btn-primary mr-2">Enviar</button>
          <button class="btn btn-light">Cancelar</button>
        </form>
      </div>
    </div>
  </div>

@endsection