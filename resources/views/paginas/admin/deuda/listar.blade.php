@extends('paginas.admin.dashboard')

@section('contenido')
     @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" role="alert">
                    <span aria-button="true">&times;</span>
                </button>
            </div>
        @endif
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
        Deudas
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Deudas</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <div style="display:flex; justify-content:space-between;">
        <h4 class="card-title">Deudas</h4>
        <h5 class="card-title">Deuda total: ${{$total}}</h5>
      </div>
     
      @if(count($deudas)>0)
      {{-- <div class="my-3" style="display:flex; justify-content: center">
          <a href="" class="btn btn-success">Abonar</a>
      </div> --}}
      @endif
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Saldo pendiente</th>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($deudas as $deuda)
                <tr>
                    <td>${{$deuda->saldo}}</td>
                    <td>{{$deuda->fecha}}</td>
                    <td>{{$deuda->proveedor->nombre}}</td>
                   <td>
                    <form method="post" id="deletedeuda{{$deuda->id}}" action="{{url('admin/deuda/'.$deuda->id)}}" class="d-inline">
                      @csrf
                      <a href="{{url('admin/deuda/'.$deuda->id.'/edit')}}" id="botoncol" class="btn btn-outline-primary " title ="Editar"><i class="fas fa-edit"></i></a>
                   @if($deuda->saldo!=0)
                      <a class="btn btn-outline-info" href="{{route('deuda.abonarProveedor',$deuda->id)}}" title="Abonar" ><li class="fas fa-money-check"></li></a>
                    @endif
                    <a class="btn btn-outline-info" href="{{route('deuda.abonos',$deuda->id)}}" title="Ver abonos" ><li class="fas fa-eye"></li></a>
                    
                    {{method_field('DELETE')}}
                          <a onclick="{{$deuda}}"  id="botoncol" class="btn btn-outline-danger" title ="Eliminar"><i class="fas fa-trash"></i></a>
                        </form>
                      </td>
                </tr>
@endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

 

 <script>

function eliminarDeuda(deuda){
  var form = document.getElementById('deletedeuda'+deuda.id);
  swal({
      title: "Estas seguro de eliminar la deuda "+deuda.nombre+" ?",
      text: "Al confirmar, la deuda será eliminada permanentemente!",
      icon: "warning",
      buttons: [
        'No, cancelar!',
        'Si, estoy seguro!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
       
          form.submit(); // <--- submit form programmatically
      
      } else {
        swal("Cancelado", "Tu deuda no ha sido eliminada", "error");
      }
    })

}
 </script>


@endsection