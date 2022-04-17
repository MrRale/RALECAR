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
      Inventarios
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Inventarios</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Inventarios</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Nombre</th>
                   
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($inventarios as $inventario)
                <tr>
                    <td>{{$inventario->nombre}}</td>
                   <td>
                 
                    <form method="post" id="deleteinventario{{$inventario->id}}" action="{{url('admin/inventario/'.$inventario->id)}}" class="d-inline">
                    @csrf
                    <a href="{{url('admin/inventario/'.$inventario->id.'/edit')}}" id="botoncol" class="btn btn-outline-warning  "><i class="fas fa-edit"></i></a>
            
                    {{method_field('DELETE')}}
                        <a id="botoncol" onclick="eliminarInventario({{$inventario}});" class="btn btn-outline-danger" ><i class="fas fa-trash"></i></a>
                        <a href="{{route('producto.productosByInventario',$inventario->id)}}" id="botoncol" class="btn btn-outline-primary " title ="Productos por inventario"><i class="fas fa-filter"></i></a>
            
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

function eliminarInventario(inventario){
  var form = document.getElementById('deleteinventario'+inventario.id);
  swal({
      title: "Estas seguro que quieres eliminar el inventario "+inventario.nombre+" ?",
      text: "Al confirmar, el inventario será eliminado permanentemente!",
      icon: "warning",
      buttons: [
        'No, cancelar!',
        'Yes, estoy seguro!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
       
          form.submit(); // <--- submit form programmatically
      
      } else {
        swal("Cancelado", "El inventario no ha sido eliminado", "error");
      }
    })

}



</script>

@endsection