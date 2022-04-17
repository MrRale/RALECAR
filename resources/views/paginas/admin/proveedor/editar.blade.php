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
            Editar proveedor
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar proveedor</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar proveedor</h4>
                <p class="card-description">

                </p>

                <form class="forms-sample" 
                    action="{{ url('admin/proveedor/' . $proveedor->id) }}" method="POST">
                    @csrf
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                        <label for="exampleInputName1">Nombre</label>
                        <input name="nombre" type="text" class="form-control" id="exampleInputName1"
                            value="{{ $proveedor->nombre }}" placeholder="nombre">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Empresa</label>
                        <input name="empresa" type="text" class="form-control" id="exampleInputName1"
                            value="{{ $proveedor->empresa }}" placeholder="empresa">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Teléfono</label>
                        <input name="telefono" type="tel" class="form-control" id="exampleInputName1"
                            value="{{ $proveedor->telefono }}" placeholder="teléfono">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Dirección</label>
                        <input name="direccion" type="text" class="form-control" id="exampleInputName1"
                            value="{{ $proveedor->direccion }}" placeholder="direccion">
                    </div>

            <button type="submit" class="btn btn-primary mr-2">Guardar cambios</button>
            <button class="btn btn-light">Cancelar</button>
            </form>
        </div>
    </div>
    </div>

@endsection

