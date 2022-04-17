@extends('paginas.admin.dashboard')

@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Clientes
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Clientes</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Clientes con crédito pendiente</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Orden</th>
                    <th>Teléfono</th>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pendientes as $pendiente)
             <tr>
                  <td>{{$pendiente->user->cedula}}</td>
                  <td>
                   {{$pendiente->id}}
                  </td>
                  <td>{{$pendiente->user->telefono}}</td>
                  <td>{{$pendiente->user->name}}</td>
                  <td>{{$pendiente->user->email}}</td>
                  <td>
                      {{-- <a target="_blank"  id="botoncol" href="" class="btn btn-outline-success" title="Ver factura"><li class="fas fa-file-pdf"></li></a>
                   --}}
                      <a  id="botoncol" href="{{route('admin.detalleByCliente',$pendiente->user->id)}}" class="btn btn-outline-info" title="Detalle de cliente"><li class="fas fa-eye"></li></a>
                      {{-- <a  id="botoncol" class="btn btn-outline-danger" title="Eliminar"><li class="fas fa-trash"></li></a>
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


@endsection