@extends('paginas.admin.dashboard')

@section('contenido')

<div class="page-header">
    <h3 class="page-title">
        Agregar vendedor
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar vendedor</li>
        </ol>
    </nav>
</div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Agregar vendedor</h4>
            <p class="card-description">

            </p>

            <form class="forms-sample" action="{{route('admin.agregarVendedor')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Nombre</label>
                    <input name="name" type="text" class="form-control" id="exampleInputName1" placeholder="nombre">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Cédula</label>
                    <input name="cedula" type="text" class="form-control" id="exampleInputName1" placeholder="cedula">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">RUC</label>
                    <input name="ruc" type="text" class="form-control" id="exampleInputName1" placeholder="ruc">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Teléfono</label>
                    <input name="telefono" type="text" class="form-control" id="exampleInputName1"
                        placeholder="Teléfono">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Correo electrónico</label>
                    <input name="email" type="email" class="form-control" id="exampleInputName1"
                        placeholder="correo electrónico">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Contraseña</label>
                    <input name="password" type="password" class="form-control" id="exampleInputName1"
                        placeholder="Contraseña">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Agregar</button>
                <button class="btn btn-light">Cancelar</button>
            </form>
        </div>
    </div>
</div>

@endsection