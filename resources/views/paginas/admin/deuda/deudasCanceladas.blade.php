@extends('paginas.admin.dashboard')

@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Deudas canceladas
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Deudas canceladas</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Deudas</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Saldo</th>
                    <th>Empresa</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($deudas as $cancelado)
             <tr>
                  <td>{{$cancelado->proveedor->nombre}}</td>
                  <td>{{$cancelado->proveedor->telefono}}</td>
                  <td>${{$cancelado->saldo}}</td>
                  <td>{{$cancelado->proveedor->empresa}}</td>
                  <td>
                      <a onclick="eliminarDeudaCancelada({{$cancelado}});" id="botoncol" class="btn btn-outline-danger" title="Eliminar"><li class="fas fa-trash"></li></a>
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

  function eliminarDeudaCancelada(deuda){
    
    swal({
        title: "Estas seguro de eliminar la deuda cancelada "+deuda.id+" ?",
        text: "Al confirmar, la deuda cancelada será eliminada permanentemente!",
        icon: "warning",
        buttons: [
          'No, cancelar!',
          'Si, estoy seguro!'
        ],
        dangerMode: true,
      }).then(function(isConfirm) {
        if (isConfirm) {
           window.location.href="/admin/deuda/eliminar/"+deuda.id;
        } else {
          swal("Cancelado", "La deuda cancelada no ha sido eliminada", "error");
        }
      })
  
  }
   </script>
@endsection