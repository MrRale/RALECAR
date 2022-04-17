@extends('paginas.admin.dashboard')

@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Productos por categoría
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Productos por categoría</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Productos</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Producto #</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Marca</th>
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
                    <td>{{$p->id}}</td>
                    <td>{{$p->codigo}}</td>
                    <td>{{$p->nombre}}</td>
                    <td>{{$p->marca}}</td>
                    <td>{{$p->stock}}</td>
                    <td>{{$p->precio}}</td>
                    <td><img src="{{ $p->images->pluck('url')[0] }}" alt="imagen de producto"></td>
                    <td>{{$p->categoria->nombre}}</td>
                    <td>{{$p->inventario->nombre}}</td>
                    <td>
                       
                        <form method="post" id="deleteproducto" action="{{url('admin/producto/'.$p->id)}}" class="d-inline">
                        @csrf
                        <a href="{{url('admin/producto/'.$p->id.'/edit')}}" id="botoncol" class="btn btn-outline-primary  ">Editar</a>
            
                        {{method_field('DELETE')}}
                        <button type="submit"  id="botoncol" class="btn btn-outline-danger" >Borrar</button>
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

  
  <script src="{{asset('dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('dashboard/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('dashboard/js/off-canvas.js')}}"></script>
  <script src="{{asset('dashboard/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('dashboard/js/misc.js')}}"></script>
  <script src="{{asset('dashboard/js/settings.js')}}"></script>
  <script src="{{asset('dashboard/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('dashboard/js/data-table.js')}}"></script>
  
 <script>
  document.querySelector('#deleteproducto').addEventListener('submit', function(e) {
  var form = this;

  e.preventDefault(); // <--- prevent form from submitting

  swal({
      title: "Estas seguro?",
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
        swal("Cancelado", "Tu producto no ha sido eliminado", "error");
      }
    })
});
</script>
@endsection