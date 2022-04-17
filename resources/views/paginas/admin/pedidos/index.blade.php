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
      Pedidos
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Pedidos</h4>
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
                  @foreach($pedidos as $pedido)
                <tr>
                    <td>{{$pedido->fecha}}</td>
                    <td>{{$pedido->descripcion}}</td>
                    <td>{{$pedido->user->name}}</td>
                    <td>{{$pedido->estado_pedido}}</td>
                    <td>{{sprintf('%.2f',$pedido->total)}}</td>
                    <td>
                   
                    
                      <a href="{{route('admin.detallePedidos',$pedido)}}" id="botoncol" class="btn btn-outline-info " title ="Ver detalle"><i class="fas fa-eye"></i></a>
            
                      <a href="{{route('admin.cambiarEstadoPedido',$pedido->id)}}" id="botoncol" class="btn btn-outline-success " title ="Cambiar estado del pedido"><i class="fas fa-user-check"></i></a>
            
                       
                    </td>
                </tr>
@endforeach
              </tbody>
            </table>
            {!! $pedidos->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection