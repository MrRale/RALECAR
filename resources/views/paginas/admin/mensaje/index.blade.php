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
      Mensajes
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Mensajes</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Mensajes</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Asunto</th>
                    <th>Mensaje</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($mensajes as $mensaje)
                <tr>
                    <td>{{$mensaje->nombre}}</td>
                    <td>{{$mensaje->email}}</td>
                    <td>{{$mensaje->telefono}}</td>
                    <td>{{$mensaje->asunto}}</td>
                    <td>{{$mensaje->mensaje}}</td>
                   <td>
                        <a id="botoncol" onclick="eliminarMensaje({{$mensaje}});" class="btn btn-outline-danger" ><i class="fas fa-trash"></i></a>
                        <a href="" id="botoncol" data-toggle="modal" data-target="#exampleModal-2{{$mensaje->id}}" class="btn btn-outline-primary " title ="Ver contenido del mensaje"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                <div  class="modal fade" id="exampleModal-2{{$mensaje->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2{{$mensaje->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content" >
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-2{{$mensaje->id}}">Asunto: {{$mensaje->asunto}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="d-flex justify-content-center">
                        
                          {{-- @if(isset($c->image->url)) --}}
                         <p>Contenido del mensaje: {{$mensaje->mensaje}}</p>
                          {{-- @else
                          <img  style="min-width:300px; min-height:350px;  border-radius:0"  alt="foto del comprobante de deposito">
                       
                          @endif --}}
                        </div>
                       
                      </div>
                    </div>
                  </div>
@endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


 <script>

function eliminarMensaje(mensaje){

  swal({
      title: "Estas seguro que quieres eliminar el mensaje "+mensaje.asunto+" ?",
      text: "Al confirmar, el mensaje será eliminado permanentemente!",
      icon: "warning",
      buttons: [
        'No, cancelar!',
        'Yes, estoy seguro!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        window.location.href="/admin/mensajes/eliminar/"+mensaje.id;
      } else {
        swal("Cancelado", "El mensaje no ha sido eliminado", "error");
      }
    })

}



</script>

@endsection