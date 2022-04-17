@extends('paginas.admin.dashboard')

@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Clientes
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Clientes</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Clientes con crédito cancelado</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Orden</th>
                    <th>Teléfono</th>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cancelados as $cancelado) <!--ordenes canceladas-->
             <tr>
                  {{-- <input name="cliente_id" type="hidden" value="{{$c->id}}" /> --}}
                  <td>{{$cancelado->user->cedula}}</td>
                  <td>
                   {{$cancelado->id}}
                  </td>
                  <td>{{$cancelado->user->telefono}}</td>
                  <td>{{$cancelado->user->name}}</td>
                  <td>{{$cancelado->user->email}}</td>
               <input type="hidden" id="ordenid{{$cancelado->id}}" value="{{$cancelado->id}}">
               <input type="hidden" id="userid{{$cancelado->id}}" value="{{$cancelado->user->id}}">
                  <td>
                      <a target="_blank"  id="botoncol" href="{{route('admin.pdfCreditoCancelado',$cancelado->id)}}" class="btn btn-outline-success" title="Ver factura"><li class="fas fa-file-pdf"></li></a>
                      <a  id="botoncol" href="{{route('admin.detalleByCliente',$cancelado->user->id)}}" class="btn btn-outline-info" title="Detalle de cliente"><li class="fas fa-eye"></li></a>
                     
                      {{-- href="{{route('admin.eliminarClienteCreditoCancelado',[$cancelado->user->id,$cancelado->id])}}"
                       --}}
                     
                      <a onclick="eliminarClienteCancelado({{$cancelado}});" id="botoncol" class="btn btn-outline-danger" title="Eliminar"><li class="fas fa-trash"></li></a>
                    
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

function eliminarClienteCancelado(orden){
var userid = document.getElementById('userid'+orden.id).value;

  swal({
      title: "Estas seguro de eliminar el registro ?",
      text: "Al confirmar, el registro será eliminado permanentemente!",
      icon: "warning",
      buttons: [
        'No, cancelar!',
        'Si, estoy seguro!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        window.location.href = "/admin/clientes/credito-cancelado/eliminar/"+userid+"/"+orden.id;

      } else {
        swal("Cancelado", "El registro no ha sido eliminado", "error");
      }
    })

}
 </script>
@endsection