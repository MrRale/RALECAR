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
        Detalles de la orden
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">  Detalles de la orden</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">

      <div class="container-fluid">
        {{-- @if(!isset($vendedor->image->url))
        <img style="max-width:150px;" class="img-lg rounded-circle mb-3" src="{{asset('dashboard/images/user_default.png')}}" alt="foto">
        @else
          <img style="max-width:300px;" class="img-lg rounded-circle mb-3" src="{{$vendedor->image->url}}" class="card-img-top" alt="...">
         @endif --}}

        
        <h3 class="text-left my-5">Orden&nbsp;&nbsp;# {{$orden->id}}</h3>
        <hr>
      </div>
      <div class="container-fluid d-flex justify-content-between">
        <div class="col-lg-3 pl-0">
          <p class="mt-5 mb-2"><b>Automotriz R.A.L.E</b></p>
          <p><br>Dirección<br>Ecuador, Quito-Quitumbe, calle Lirañan y Ñusta</p>
        </div>
        <div class="col-lg-3 pr-0">
          <p class="mt-5 mb-2 text-right"><b>Emitida por</b></p>
          <p class="text-right">{{$vendedor->name}}
            <p class="mt-1 mb-2 text-right"><b>Para</b></p>
@if(isset($cliente->name))
            <p class="text-right">{{$cliente->name}},
              @else
              <p class="text-right">{{$orden->nombres}} {{$orden->apellidos}},</p>
@endif
            <br> {{$vendedor->cedula}},<br> {{$vendedor->telefono}}<br> {{$orden->direccion}}.</p>
        </div>
      </div>
      <div class="container-fluid d-flex justify-content-between">
        <div class="col-lg-3 pl-0">
          <p class="mb-5  ">Fecha de compra : {{date('d-m-Y', strtotime($orden->fecha))}}</p>
          
          {{-- <p>Fecha de vencimiento : {{$orden->fecha_orden->addDays(3)}}</p> --}}
        </div>

        <div> <a target="_blank" href="{{route('admin.pdfOrdenVendedor',$orden->id)}}">Imprimir <li class="fas fa-file-pdf"></li></a></div>
      </div>



      <h4 class="card-title">Detalles de orden</h4>



      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Producto #</th>
                    <th>Foto</th>
                    <th>Código</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>TOTAL</th>
                    
                </tr>
              </thead>
              <tbody>
                  @foreach($ordenes as $detalle)
                <tr>
                    <td>{{$detalle->id}}</td>
                    <td>
                        <img src="  {{$detalle->producto->images->pluck('url')[0] }}" />
                    </td>
                    <td>{{$detalle->producto->codigo}}</td>
                    <td>{{$detalle->cantidad}}</td>
                    <td>${{sprintf('%.2f',$detalle->precio)}}</td>
                    <td>${{sprintf('%.2f',$detalle->cantidad * $detalle->precio)}}</td>
                    
                </tr>
@endforeach
@if($orden->ruc!="")
<tr>
  <td></td><td></td><td></td>
  <td>IVA({{$empresa->iva}}%)</td>
  <td>${{sprintf('%.2f',$orden->subtotal*$empresa->iva*0.01)}}</td>
  <td></td>
</tr>
@endif
@if($valor)
<tr>
  <td></td><td></td><td></td>
  <td>Abono</td>
  <td>${{sprintf('%.2f',$valor)}}</td>
  <td></td>
</tr>
@endif
@php
            $iva = 0;
            if($orden->ruc!=""){
                $iva = $orden->subtotal*$empresa->iva*0.01;
            }
            $descuento = ($orden->subtotal+($iva))*0.10;
            @endphp
@if($orden->saldo==0)
<tr>
  <td></td><td></td><td></td>
  <td>Descuento (10%)</td>
  <td>${{sprintf('%.2f',$descuento)}}</td>
  <td></td>
</tr>
@endif
@if($orden->meses)
<tr>
  <td></td><td></td><td></td>
  <td>Meses</td>
  <td>{{$orden->meses}}</td>
  <td></td>
</tr>
@php
$iva = 0;
if($orden->ruc!=""){
  $iva = $orden->subtotal*$empresa->iva*0.01;
}
$subtotal = $orden->subtotal+$iva-$valor;
if($orden->meses>3)
{
  $res = $subtotal + $subtotal*(6*$orden->meses*0.01);
    $cuota = $res / $orden->meses;
}else{

    $cuota = $subtotal / $orden->meses;
}
    
@endphp
<tr>
  <td></td><td></td><td></td>
  <td>Cuota</td>
  <td>${{sprintf('%.2f',$cuota)}}</td>
  <td></td>
</tr>
@endif
<tr>
  <td></td>
  <td></td> 
  <td></td>
  <td></td>
  <td></td>
  <td>${{sprintf('%.2f',$orden->total_pagar)}}</td>
</tr>
              </tbody>
            </table>
            {{-- {!! $pedidos->links() !!} --}}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection