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
        Detalles de la venta
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalles de la venta</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Detalles de la venta</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Producto #</th>
                    <th>Foto</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>TOTAL</th>
                    
                </tr>
              </thead>
              <tbody>
                  @foreach($detalles as $detalle)
                <tr>
                    <td>{{$detalle->id}}</td>
                    <td>
                        <img src="  {{$detalle->producto->images->pluck('url')[0] }}" />
                    </td>
                    <td>{{$detalle->producto->nombre}}</td>
                    <td>{{$detalle->cantidad}}</td>
                    <td>{{$detalle->precio}}</td>
                    <td>{{$detalle->cantidad * $detalle->precio}}</td>
                    
                </tr>
@endforeach
              </tbody>
            </table>
            {{-- {!! $pedidos->links() !!} --}}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection