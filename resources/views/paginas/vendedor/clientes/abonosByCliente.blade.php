@extends('paginas.admin.dashboard')

@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Abonos
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Abonos</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Abonos del cliente {{$cliente->name}}</h4>
      <div class="my-5" style="display:flex; flex-direction:row; justify-content:space-between;">
        <a href="{{route('admin.guardarAbono',[$cliente->id, $orden->id])}}" class="btn btn-success"> Agregar abono</a>
      <h3>Saldo: ${{sprintf('%.2f',$saldo)}}</h3>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Abono #</th>
                    <th>Fecha</th>
                    <th>Valor</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($abonos as $key => $c)
              <tr>
               
                  <td>{{$key+1}}</td>
                  <td>{{$c->fecha}}</td>
                <td>{{sprintf('%.2f',$c->valor)}}</td>
                
                  <td>
                      <a target="_blank" id="botoncol" title="Generar recibo" href="{{route('admin.pdfAbono',[$c->id,$cliente->id,$saldo])}}" class="btn btn-danger"><li class="fa fa-file-pdf"></li></a>
                      <a target="_blank" id="botoncol" title="Ver comprobante" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal-2{{$key}}"><li class="fas fa-eye"></li></a>

                      <div  class="modal fade" id="exampleModal-2{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2{{$key}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content" >
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel-2{{$key}}">Imagen del deposito</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="d-flex justify-content-center">
                            
                              {{-- @if(isset($c->image->url)) --}}
                              <img  style="min-width:300px; min-height:350px;  border-radius:0" src="{{$c->image->url}}" alt="foto del comprobante de deposito">
                              {{-- @else
                              <img  style="min-width:300px; min-height:350px;  border-radius:0"  alt="foto del comprobante de deposito">
                           
                              @endif --}}
                            </div>
                           
                          </div>
                        </div>
                      </div>
                      {{-- <form method="post" id="deleteproducto" action="{{url('admin/producto/'.$p->id)}}" class="d-inline">
                      @csrf
                      {{method_field('DELETE')}}
                      <button type="submit"  id="botoncol" class="btn btn-outline-danger" >Borrar</button>
                    </form> --}}
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

</script>
@endsection