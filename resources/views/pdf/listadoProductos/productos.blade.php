<!DOCTYPE html>
<html>

<head>
    <title>Productos</title>
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
      
        <h2 id="name__doc">Productos</h2>
        <h5 id="description__team">Automotriz R.A.L.E</h5>
        <h5 id="description__team">Quito-Quitumbe, calle Lirañan y Ñusta</h5>
<br/>


<table class="table table-light" id="tabla__datos" align="center">
    <thead class="thead-light">
        <tr id="cabecera__tabla">
            <th>N°</th>
            <th>CÓDIGO</th>
            <th>PRODUCTO</th>
            <th>P.UNITARIO</th>
           <th>CANTIDAD</th>
            <th>SUBTOTAL</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $key => $p)
        <tr class="fila">
            <td>{{$key+1}}</td>
            <td>{{$p->codigo}}</td>
            <td>{{$p->nombre}}</td>
            <td>{{$p->precio}}</td>
            <td>{{$p->stock}}</td>
            <td>${{$p->precio*$p->stock}}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>

        @php 
        foreach($productos as $producto)
        {
            $total = 0;
            $total = $total + $producto->stock*$producto->precio;
        }
        @endphp
     
        <tr class="fila__footer">
          <td></td> <td></td><td></td><td></td>
          <th></th>
          <th >TOTAL<p id="total">${{$total}}</p> </th>   
        </tr>
    </tfoot>
</table>

</body>

</html>
