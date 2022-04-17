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
            Editar información
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar información</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar información</h4>
                <p class="card-description">

                </p>

                <form class="forms-sample" action="{{route('empresa.guardarDatos')}}" method="POST">
                    @csrf
                    {{-- {{ method_field('PATCH') }} --}}
                    <div class="form-group">
                        <label for="exampleInputName1">Nombre de la empresa</label>
                        <input name="nombre" type="text" class="form-control" id="exampleInputName1"
                            value="{{ $empresa->nombre }}" placeholder="nombre">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Impuesto al valor agregado (IVA)</label>
                        <input name="iva" type="number" min="10" max="15" class="form-control" id="exampleInputName1"
                            value="{{ $empresa->iva }}" placeholder="iva">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Teléfono</label>
                        <input name="telefono" type="tel"  class="form-control"
                            id="exampleInputName1" value="{{ $empresa->telefono }}" placeholder="(codigo país) número">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Teléfono alternativo</label>
                        <input name="telefono2" type="tel" 
                            class="form-control" id="exampleInputName1" value="{{ $empresa->telefono2 }}"
                            placeholder="telefono alternativo">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Correo electrónico</label>
                        <input name="correo" type="email" class="form-control" id="exampleInputName1"
                            value="{{ $empresa->correo }}" placeholder="correo electrónico">
                    </div>



                    <button type="submit" class="btn btn-primary mr-2">Guardar cambios</button>
                    <button class="btn btn-light">Cancelar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
