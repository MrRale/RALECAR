@extends('paginas.admin.dashboard')

@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Productos
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Productos</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Productos</h4>
      <div class="filtro" style=" margin-left:-10px; display:flex; justify-content:center; max-width:250px;">
        <form id="formFiltrarProductos" action="{{route('productos.filtrar2')}}" method="POST" class="d-inline">
          @csrf
          <select id="filtro" class="js-example-basic-single w-100 my-3" onchange="filtrar();" name="cantidad">
            <option selected disable>Filtrar por cantidad</option>
            <option value="1">1</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="1000">Todos</option>
        </select>
        </form>
     
      </div>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Categoría</th>
                    <th>Inventario</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($productos as $p)
                <tr>
                    <td>{{$p->codigo}}</td>
                    <td>{{$p->nombre}}</td>
                    <td>{{$p->stock}}</td>
                    <td>{{$p->precio}}</td>
                    <td><img src="{{ $p->images->pluck('url')[0] }}" alt="imagen de producto"></td>
                    <td>{{$p->categoria->nombre}}</td>
                    <td>{{$p->inventario->nombre}}</td>
                    <td>
                        <a href="{{url('admin/producto/'.$p->id.'/edit')}}" id="botoncol" class="btn btn-outline-primary  "><i class="fas fa-edit"></i></a>
            
                        <form method="POST" id="deleteproducto{{$p->id}}" action="{{url('admin/producto/'.$p->id)}}" class="d-inline">
                        @csrf
                        {{method_field('DELETE')}}
                        <a  id="botoncol" onclick="eliminarProducto({{$p}});" class="btn btn-outline-danger" title ="Eliminar"><i class="fas fa-trash"></i></A>
                       
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

function eliminarProducto(producto){
  var form = document.getElementById('deleteproducto'+producto.id);
  swal({
      title: "Estas seguro que quieres eliminar el producto "+producto.nombre+" ?",
      text: "Al confirmar, el producto será eliminado permanentemente!",
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
        swal("Cancelado", "El producto no ha sido eliminado", "error");
      }
    })

}

function filtrar(){
    var opcion = document.getElementById("filtro");
    var form = document.getElementById('formFiltrarProductos');
    form.submit();
  }

</script>
@endsection