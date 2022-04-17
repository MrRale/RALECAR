@extends('paginas.admin.dashboard')

@section('contenido')
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
        Editar vendedor
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar vendedor</li>
        </ol>
    </nav>
</div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Editar vendedor</h4>
            <p class="card-description">

            </p>

            <form class="forms-sample" action="{{ url('admin/vendedor/editar/' . $vendedor->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Nombre</label>
                    <input name="name" value="{{ $vendedor->name }}" type="text" class="form-control"
                        id="exampleInputName1" placeholder="nombre">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Cédula</label>
                    <input name="cedula" value="{{ $vendedor->cedula }}" type="text" class="form-control"
                        id="exampleInputName1" placeholder="cedula">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">RUC</label>
                    <input name="ruc" value="{{ $vendedor->ruc }}" type="text" class="form-control"
                        id="exampleInputName1" placeholder="ruc">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Teléfono</label>
                    <input name="telefono" value="{{ $vendedor->telefono }}" type="text" class="form-control"
                        id="exampleInputName1" placeholder="Teléfono">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Correo electrónico</label>
                    <input name="email" value="{{ $vendedor->email }}" type="email" class="form-control"
                        id="exampleInputName1" placeholder="correo electrónico">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Contraseña</label>
                    <input name="password" type="password" class="form-control" id="exampleInputName1"
                        placeholder="Contraseña">
                </div>

                <button type="submit" class="btn btn-primary mr-2">Guardar cambios</button>
                <button class="btn btn-light">Cancelar</button>
            </form>
        </div>
    </div>
</div>

@endsection