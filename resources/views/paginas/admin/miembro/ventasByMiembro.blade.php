@extends('paginas.admin.dashboard')

@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Clientes atendidos en la venta
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Clientes atendidos en la venta por {{$vendedor->name}}</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"> Clientes atendidos en la venta por {{$vendedor->name}}</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Miembro #</th>
                    <th>Cliente</th>
                    <th>Cédula</th>
                    <th>RUC</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    {{-- <th>Rol</th> --}}
                    {{-- <th>Acciones</th> --}}
                </tr>
              </thead>
              <tbody>
                  @foreach($ventas as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->nombres}}</td>
                    <td>{{$p->cedula}}</td>
                    <td>{{$p->ruc}}</td>
                    <td>{{$p->telefono}}</td>
                    <td>{{$p->email}}</td>
                    {{-- <td>{{$p->getRoleNames()}}</td> --}}
                    <td>
                  
                     
                        {{-- <a href="" id="botoncol" class="btn btn-outline-info " title ="Generar reporte"><i class="fas fa-file-pdf"></i></a>
                      
                        --}}
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
  document.querySelector('#deletemiembro').addEventListener('submit', function(e) {
  var form = this;

  e.preventDefault(); // <--- prevent form from submitting

  swal({
      title: "Estas seguro?",
      text: "Al confirmar, el miembro será eliminado permanentemente!",
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
        swal("Cancelado", "El miembro no ha sido eliminado", "error");
      }
    })
});
</script>
@endsection