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
        Proveedores
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Proveedores</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Proveedores</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($proveedores as $proveedor)
                <tr>
                    <td>{{$proveedor->nombre}}</td>
                    <td>{{$proveedor->empresa}}</td>
                    <td>{{$proveedor->telefono}}</td>
                   <td>{{$proveedor->direccion}}</td>
          
                   <td>
                    <form method="POST" id="deleteproveedor{{$proveedor->id}}" action="{{url('admin/proveedor/'.$proveedor->id)}}" class="d-inline">
                      @csrf
                      <a href="{{url('admin/proveedor/'.$proveedor->id.'/edit')}}" id="botoncol" class="btn btn-outline-primary " title ="Editar"><i class="fas fa-edit"></i></a>
                      <a href="{{route('deuda.deudasByProveedor',$proveedor->id)}}" id="botoncol" class="btn btn-outline-info " title ="Ver deuda"><i class="fas fa-eye"></i></a>
                      {{method_field('DELETE')}}
                          <a onclick="eliminarProveedor({{$proveedor}});"  id="botoncol" class="btn btn-outline-danger" title ="Eliminar"><i class="fas fa-trash"></i></a>
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

function eliminarProveedor(proveedor){
  var form = document.getElementById('deleteproveedor'+proveedor.id);
  swal({
      title: "Estas seguro de eliminar el proveedor "+proveedor.nombre+" ?",
      text: "Al confirmar, el proveedor será elimanado permanentemente!",
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
        swal("Cancelado", "El proveedor no ha sido eliminada", "error");
      }
    })

}
 </script>

@endsection