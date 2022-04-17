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
       Agregar deuda
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar deuda</li>
        </ol>
    </nav>
  </div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Agregar deuda</h4>
        <p class="card-description">
          
        </p>
        <form class="forms-sample" action="{{route('deuda.store')}}" method="POST" >
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Monto a pagar</label>
            <input name="saldo" type="text" min="0.01" step="0.01" class="form-control" id="exampleInputName1" placeholder="monto de la deuda">
          </div>

          
          <div class="form-group">
            <label>Proveedor</label>
            <select class="js-example-basic-single w-100" name="proveedor_id">
                @foreach ($proveedores as $proveedor)
                <option value="{{$proveedor->id}}">Nombre: {{$proveedor->nombre}} &nbsp;&nbsp;&nbsp;&nbsp; Empresa: {{$proveedor->empresa}}</option>
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