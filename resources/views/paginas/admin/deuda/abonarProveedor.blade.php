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
      <div class="card-body" >
          <div style="display:flex; justify-content:space-between">
            <h4 class="card-title">Agregar abono</h4>
            <h4>Saldo: ${{$deuda->saldo}}</h4>
          </div>
      
        <p class="card-description">
          
        </p>
        <form class="forms-sample" action="{{route('deuda.guardarAbono')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="deuda_id" value="{{$deuda->id}}">
          <div class="form-group">
            <label for="exampleInputName1">Valor a abonar</label>
            <input name="abono" type="number" min="0.01" step="0.01" class="form-control" id="exampleInputName1" placeholder="valor que abonará">
          </div>

            <div class="form-group">
            <label for="exampleInputName1">Imagen del deposito</label>
            <input name="imagen" type="file"  class="form-control" id="exampleInputName1">
          </div>

       
          <button type="submit" class="btn btn-primary mr-2">Enviar</button>
          <button class="btn btn-light">Cancelar</button>
        </form>
      </div>
    </div>
  </div>

@endsection