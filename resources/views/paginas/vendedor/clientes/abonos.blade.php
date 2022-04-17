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
      <h4 class="card-title">Abonos</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Orden</th>
                    <th>Teléfono</th>
                    <th>Cliente</th>
                    <th>Correo electrónico</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($clientes as $c)
              <tr>
                 {{--  apertura de formulario de ver abonos --}}
                 <form action="{{route('admin.abonosByCliente')}}" id="formAbonos{{$c->id}}" class="d-hidden" method="POST" >
                  @csrf
                  <input name="cliente_id" type="hidden" value="{{$c->id}}" />
                  <td>{{$c->cedula}}</td>
                  <td>
                    <select id="cuenta" class="selectcuenta form-control"  name="orden_id" class="myniceselect nice-select wide" required>
                      <option selected="true" disabled="disabled">Ordenes</option>
                      @foreach($c->ordenes as $orden)
                      <option class="op" value="{{$orden->id}}">{{$orden->id}}</option>
                      @endforeach
                  </select>
                  </td>
                  <td>{{$c->telefono}}</td>
                  <td>{{$c->name}}</td>
                  <td>{{$c->email}}</td>
                </form> {{--  cierre de formulario de ver abonos --}}
                  <td>
                    <a onclick="event.preventDefault();
                    document.getElementById('formAbonos{{$c->id}}').submit();" id="botoncol" class="btn btn-outline-info " title ="Ver abonos"><i class="far fa-money-bill-alt"></i></a>
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

  
{{-- 
  <script src="{{asset('dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('dashboard/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('dashboard/js/off-canvas.js')}}"></script>
  <script src="{{asset('dashboard/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('dashboard/js/misc.js')}}"></script>
  <script src="{{asset('dashboard/js/settings.js')}}"></script>
  <script src="{{asset('dashboard/js/todolist.js')}}"></script> --}}
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('dashboard/js/data-table.js')}}"></script>
  
 
@endsection