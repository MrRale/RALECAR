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
      <h4 class="card-title">Clientes</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Cédula</th>
                    {{-- <th>Ordenes</th> --}}
                    <th>Teléfono</th>
                    <th>Cliente</th>
                    <th>Correo electrónico</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($clientes as $c)
              <tr>
                  <td>{{$c->cedula}}</td>


                  <td>{{$c->telefono}}</td>
                  <td>{{$c->name}}</td>
                  <td>{{$c->email}}</td>

                </form> 
             
                  <td>
                      
   
                    <a href="{{route('admin.detalleByCliente',$c->id)}}" id="botoncol" class="btn btn-outline-info " title ="Ver detalles"><i class="fas fa-eye"></i></a>
            
                   
                  
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