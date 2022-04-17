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
       Agregar abono
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar abono</li>
        </ol>
    </nav>
  </div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div style="display:flex; flex-direction:row;justify-content:space-around">
          <h4 class="card-title">Cliente: {{$cliente->name}}</h4>
          <h4 class="card-title">Orden: {{$orden->id}}</h4>
          <h4 class="card-title">Cuotas: ${{$orden->control_orden->cuota}} X {{$orden->control_orden->meses}} meses.</h4>
          <h4 class="card-title">Saldo actual: ${{$orden->saldo}}</h4>  
        </div>
     
        <p class="card-description">
          
        </p>
        <form class="forms-sample" action="{{route('admin.storeAbono')}}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label for="exampleInputEmail3">Monto</label>
            <input  class="form-control" type="number" step="0.01" name="monto"  id="monto" required>
          </div>
        <input type="hidden" name="orden_id" value="{{$orden->id}}" />
 
          <div class="form-group">
            <label for="exampleInputEmail3">Comprobante de depósito</label>
            <input  class="form-control" type="file" name="imagen"  id="imagen" required>
          </div>
         
         
       
          <button type="submit" class="btn btn-primary mr-2">Enviar</button>
          <button class="btn btn-light">Cancelar</button>
        </form>
      </div>
    </div>
  </div>

@endsection