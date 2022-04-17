@extends('paginas.admin.dashboard')

@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Miembros
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Miembros</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Miembros</h4>
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
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($miembros as $p)
                <tr>
                    <td>{{$p->name}}</td>
                    <td>{{$p->cedula}}</td>
                    <td>{{$p->ruc}}</td>
                    <td>{{$p->telefono}}</td>
                    <td>{{$p->email}}</td>
                    <td>{{$p->getRoleNames()}}</td>
                    <td>
                  
                   
                        <a href="{{route('admin.ventasByMiembro',$p->id)}}" id="botoncol" class="btn btn-outline-info " title ="Ver ventas"><i class="fas fa-eye"></i></a>
                        
                        <a onclick="eliminarMiembro({{$p}});"  id="botoncol" class="btn btn-outline-danger" title="Eliminar miembro"><li class="fas fa-trash"></li></a>
                 
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

function eliminarMiembro(miembro){
  
  swal({
      title: "Estas seguro de eliminar al miembro "+miembro.name+" ?",
      text: "Al confirmar, el miembro será eliminado permanentemente!",
      icon: "warning",
      buttons: [
        'No, cancelar!',
        'Si, estoy seguro!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
         window.location.href="/admin/miembro/eliminar/"+miembro.id;
      } else {
        swal("Cancelado", "El miembro no ha sido eliminado", "error");
      }
    })

}
 </script>
@endsection