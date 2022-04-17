@extends('paginas.admin.dashboard')

@section('contenido')
    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="page-header">
        <h3 class="page-title">
            Editar perfil
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar perfil</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar perfil</h4>
                <p class="card-description">

                </p>

                <form class="forms-sample" enctype="multipart/form-data" action="{{route('admin.updatePerfilAdministracion')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input name="nombre" type="text" class="form-control" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="cedula">Cédula</label>
                        <input name="cedula" type="text" class="form-control" value="{{ $user->cedula }}">
                    </div>

                    <div class="form-group">
                        <label for="codigo">RUC</label>
                        <input name="ruc" type="text" class="form-control" value="{{ $user->ruc }}">
                    </div>
                    <div class="form-group">
                        <label for="codigo">Teléfono</label>
                        <input name="telefono" type="tel" class="form-control" value="{{ $user->telefono }}">
                    </div>

                    <div class="form-group">
                        <label for="codigo">Contraseña nueva</label>
                        <input name="password" type="password" class="form-control" value="">
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">Guardar cambios</button>
                    <button class="btn btn-light">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
