@extends('paginas.admin.dashboard')

@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Vendedores
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Vendedores</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Vendedores</h4>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cédula</th>
                                <th>RUC</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vendedores as $v)
                            <tr>
                                <td>{{$v->name}}</td>
                                <td>{{$v->cedula}}</td>
                                <td>{{$v->ruc}}</td>
                                <td>{{$v->telefono}}</td>
                                <td>{{$v->email}}</td>
                                <td>
                                    <form method="post" id="deleteVendedor{{$v->id}}"
                                        action="{{url('admin/vendedor/eliminar/'.$v->id)}}" class="d-inline">
                                        @csrf
                                        <a href="{{url('admin/vendedor/'.$v->id.'/edit')}}" id="botoncol"
                                            class="btn btn-outline-primary " title="Editar"><i
                                                class="fas fa-edit"></i></a>
                                        <a 
                                            onclick="eliminarVendedor({{$v}})"
                                            id="botoncol" class="btn btn-outline-danger" title="Eliminar vendedor">
                                            <li class="fas fa-trash"></li>
                                        </a>
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

function eliminarVendedor(vendedor){
var form = document.getElementById('deleteVendedor'+vendedor.id);
swal({
    title: "Estas seguro de eliminar el vendedor "+vendedor.name+" ?",
    text: "Al confirmar, el vendedor será eliminado permanentemente!",
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
      swal("Cancelado", "El vendedor no ha sido eliminado", "error");
    }
  })

}
</script>
@endsection