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
            Editar deuda
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar deuda</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar deuda</h4>
                <p class="card-description">

                </p>

                <form class="forms-sample" 
                    action="{{ url('admin/deuda/' . $deuda->id) }}" method="POST">
                    @csrf
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                        <label for="exampleInputName1">Saldo</label>
                        <input name="saldo" type="text" class="form-control" id="exampleInputName1"
                            value="{{ $deuda->saldo }}" placeholder="saldo">
                    </div>

                    <div class="form-group">
                        <select class="category form-control" name="proveedor_id">
                          <option label="Select Option"></option>
                          @foreach ($proveedores as $proveedor)
                              <option value="{{ $proveedor->id }}"
                                  {{ old('proveedor_id', $deuda->proveedor_id) == $proveedor->id ? 'selected' : '' }}>
                                 {{ $proveedor->nombre}}</option>
                          @endforeach
                     </select>
                     </div>

            <button type="submit" class="btn btn-primary mr-2">Guardar cambios</button>
            <button class="btn btn-light">Cancelar</button>
            </form>
        </div>
    </div>
    </div>

@endsection

