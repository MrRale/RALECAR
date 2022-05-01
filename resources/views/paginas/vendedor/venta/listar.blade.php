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
        Mis ventas
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Mis ventas</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Mis ventas</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($ventas as $orden)
                <tr>
                    <td>{{$orden->fecha}}</td>
                    <td>{{$orden->descripcion}}</td>
                    @if(isset($orden->user->name))
                    <td>{{$orden->user->name}}</td>
                    @else
                    <td>{{$orden->nombres}}</td>
                    @endif
                    <td>{{$orden->estado_pedido}}</td>
                    <td>${{$orden->total_pagar}}</td>
                    <td>   
                      <a href="{{route('admin.detalleVenta',$orden->id)}}" id="botoncol" class="btn btn-outline-info " title ="Ver detalle"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
@endforeach
              </tbody>
            </table>
            {!! $ventas->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection