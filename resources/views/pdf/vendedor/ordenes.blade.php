<!DOCTYPE html>
<html>

<head>
    <title>Pedido del cliente</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}
</head>

<body>
    <style>
/*        
       @import url('https://fonts.googleapis.com/css2?family=Nunito:ital@1&family=Poppins:ital,wght@1,600&display=swap');
        */
        #imagen{
            position:absolute;
            width:100px;
            margin-left:500px;
        }

        body{
            color:blue;
        }
        table{
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        #name__doc{
           font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
           font-size:30px;
           font-weight: 700;
           
       }

       #description__team{
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
           font-weight: 700;
           line-height : 5px;
       }

       #title__c1{
           font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
           font-weight: 700;
       }
       #title__c2{
           font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
           font-weight: 700;
           text-align: center;
       }
       #title__c3{
           font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
           font-weight: 700;
           text-align: center;
       }
       #cabecera__tabla{
           /* background:yellow; */
           border-top: 1px solid #369;
           /* padding: 2px; */
       }
       #cabecera__tabla th{
           padding:0px 10px;
       }

    

       #tabla__datos{
           margin-top:70px;
           border: black 5px solid;
           width:700px;
       }

    
       .fila td{
           text-align:center;
           color:black;
       }
       .fila__footer td{
        text-align:center;
       }

       #items__footer{
           color:black;
       }

       .total{
           font-weight:bold;
       }

       
    </style>

    {{-- < class="container"> --}}
        {{-- <img class="img" src="{{public_path('/images/logo/logoPassionReal.jpeg')}}"> --}}
        {{-- <div class="titulo">FACTURA</div>
        <div class="empresa">Automotriz R.A.L.E</div> --}}
        <img id="imagen" src="{{asset('assets/img/logos/logo-automotriz-rale.png')}}">
        <h2 id="name__doc">FACTURA</h2>
        <h5 id="description__team">Automotriz R.A.L.E</h5>
        <h5 id="description__team">Quito-Quitumbe, calle Lirañan y Ñusta</h5>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>FACTURAR A</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>N° FACTURA: {{$factura->id}}</th>
        </tr>
    </thead>
    <tbody>
        <tr class="fila">
            <td>Cliente: {{$orden->nombres}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FECHA:{{$orden->fecha}}</th>
        </tr>
        <tr class="fila">
            <td>C.I: {{$orden->cedula}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <th>VENDEDOR:{{$vendedor->name}}</th>
        </tr>
        <tr class="fila">
            <td>Dirección: {{$orden->direccion}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <th></th>
        </tr>
        <tr class="fila">
            <td>Teléfono: {{$orden->telefono}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <th></th>
        </tr>
    </tbody>
</table>


<table class="table table-light" id="tabla__datos" align="center">
    <thead class="thead-light">
        <tr id="cabecera__tabla">
            {{-- <th>#ORDEN</th> --}}
            <th>CANTIDAD</th>
              <th>CÓDIGO</th>
            <th>PRODUCTO</th>
          
            <th>PRECIO UNITARIO</th>
       
            <th>SUBTOTAL</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordenes as $key => $p)
        <tr class="fila">
            {{-- <td>{{$key+1}}</td> --}}
            <td>{{$p->cantidad}}</td>
            <td>{{$p->producto->codigo}}</td>
            <td>{{$p->producto->nombre}}</td>
         
            <td>{{$p->precio}}</td>
          
            <td>${{$p->precio*$p->cantidad}}</td>
            {{-- <hr/> --}}
        </tr>
        
        @endforeach
    </tbody>
    <tfoot>
        <tr class="fila__footer">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
@if($orden->ruc!="")
          <td >IVA({{$empresa->iva}}%)</td>
          @php
          $iva = $orden->subtotal*$empresa->iva*0.01;
          @endphp
          <td id="items__footer">${{$iva}}</td>
@endif
        </tr>
        <tr class="fila__footer">
            <td></td><td></td><td></td><td></td>
            @php
            $iva = 0;
            if($orden->ruc!=""){
                $iva = $orden->subtotal*$empresa->iva*0.01;
            }
            $descuento = ($orden->subtotal+($iva))*0.10;
            @endphp
           @if($orden->saldo==0)
            <td >Dto (10%)</td>
            <td id="items__footer"> - ${{$descuento}}</td>
         @else
            <tr class="fila__footer">
                <td></td><td></td><td></td><td></td>
                <td>Subtotal</td>
                <td id="items__footer">${{$orden->subtotal+$iva}}</td>
            </tr>
            <tr class="fila__footer">
                <td></td><td></td><td></td><td></td>
                <td>Meses</td>
                <td id="items__footer">{{$orden->meses}}</td>
            </tr>
            @php
            if($orden->ruc!="")
            $subtotal_iva = $orden->subtotal+($orden->subtotal*$empresa->iva*0.01);//24
            else {
                $subtotal_iva = $orden->subtotal;
            }
            $resto = $subtotal_iva - $entrada;//204
            $interes = $resto *6*($orden->meses/100);//48.96
            $totalpagar = $resto+$interes ;
            $cuota = $totalpagar/$orden->meses;
              
            @endphp
            <tr class="fila__footer">
                <td></td><td></td><td></td><td></td>
                <td>Cuotas</td>
                <td id="items__footer">{{$cuota}} c/mes</td>
            </tr>
          @endif
          </tr>
          <tr class="fila__footer">
            <td></td> <td></td><td></td><td></td>
            <td >Total</td>
            <td id="items__footer" class="total">${{$orden->total_pagar}}</td>
          </tr>
      </tfoot>
</table>


        
        
    {{-- </div> --}}
    {{-- <div class="page-break"></div>
        <h1>Page 2</h1> --}}
</body>

</html>
