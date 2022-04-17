@extends('paginas.admin.dashboard')
@section('contenido')
    <div class="page-header">
        <h3 class="page-title">
            Notificaciones
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Notificaciones</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Notificaciones</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">

                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Emitida por</th>
                                        <th>Comprador</th>
                                        <th>Información</th>
                                        <th>Emitida</th>
                                        <th>Leido</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($notificaciones as $notificacion)
                                        <tr>
                                            <td>{{ isset($notificacion->data['nombre_vendedor']) ? $notificacion->data['nombre_vendedor'] : 'Compra en linea' }}
                                            </td>
                                            <td>{{ isset($notificacion->data['nombres']) ? $notificacion->data['nombres'] : $notificacion->data['nombre'] }}
                                            </td>
                                            <td>
                                                @json($notificacion->data['titulo'])
                                            </td>
                                            <td>{{ $notificacion->created_at }}</td>
                                            <td>{{ $notificacion->read_at }}</td>
                                            <td style="display:flex; justify-content: space-between;">
                                                @if ($notificacion->type == 'App\Notifications\NotificacionOrden')
                                                    <a class="btn btn-info" title="Ver notificación"
                                                        href="{{ route('marcar_orden_leida', [$notificacion->id, $notificacion->data['id']]) }}">
                                                        <li class="fas fa-eye"></li>
                                                    </a>
                                                @else
                                                    <a class="btn btn-info" title="Ver notificación"
                                                        href="{{ route('marcar_pedido_leido', [$notificacion->id, $notificacion->data['id']]) }}">
                                                        <li class="fas fa-eye"></li>
                                                    </a>
                                                @endif

                                                <a class="btn btn-danger mx-1" title="Eliminar notificación"
                                                    onclick="eliminarNotificacion({{$notificacion}});">
                                                    <li class="fas fa-trash"></li>
                                                </a>
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

       


        <script>
            function eliminarNotificacion(notificacion) {
                swal({
                    title: "Estas seguro de eliminar la notificación ?",
                    text: "Al confirmar, la notificación será eliminada permanentemente!",
                    icon: "warning",
                    buttons: [
                        'No, cancelar!',
                        'Si, estoy seguro!'
                    ],
                    dangerMode: true,
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        window.location.href = "/admin/notificacion/eliminar/"+notificacion.id;
                    } else {
                        swal("Cancelado", "La notificación no ha sido eliminada", "error");
                    }
                });

            }
        </script>
    @endsection
