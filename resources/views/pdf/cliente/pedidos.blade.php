<!DOCTYPE html>
<html>

<head>
    <title>Pedido del cliente</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
</head>

<body>
    <style>
       
    
        #imagen{
            position:absolute;
            width:200px;
            margin-left:470px;
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
       #total{
           color:black;
       }

       
    </style>

   
        <img id="imagen" src="../public/assets/images/logos/logo-automotriz-rale.png">
      
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
            <th>N° FACTURA: {{$pedido->id}}</th>
        </tr>
    </thead>
    <tbody>
        <tr class="fila">
            <td>Cliente: {{$pedido->user->name}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FECHA:{{$pedido->fecha}}</th>
        </tr>
        <tr class="fila">
            <td>C.I: {{$cliente->cedula}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
           
        </tr>
        <tr class="fila">
            <td>Dirección: {{$cliente->direccion}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          
        </tr>
        <tr class="fila">
            <td>Teléfono: {{$cliente->telefono}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
         
        </tr>
    </tbody>
</table>


<table class="table table-light" id="tabla__datos" align="center">
    <thead class="thead-light">
        <tr id="cabecera__tabla">
            <th>CANTIDAD</th>
            <th>CÓDIGO</th>
            <th>PRODUCTO</th>
            <th>PRECIO UNITARIO</th>
            <th>SUBTOTAL</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pedidos as $key => $p)
        <tr class="fila">
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
            <td></td> <td></td><td></td><td></td>
            <th >TOTAL<p id="total">${{$p->precio*$p->cantidad}}</p> </th>
           
     
          </tr>
      </tfoot>
</table>

</body>

</html>
