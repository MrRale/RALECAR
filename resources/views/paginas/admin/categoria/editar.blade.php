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
            Editar categoría
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar categoría</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar categoría</h4>
                <p class="card-description">

                </p>

                <form class="forms-sample" enctype="multipart/form-data"
                    action="{{ url('admin/categoria/' . $categoria->id) }}" method="POST">
                    @csrf
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                        <label for="exampleInputName1">Nombre</label>
                        <input name="nombre" type="text" class="form-control" id="exampleInputName1"
                            value="{{ $categoria->nombre }}" placeholder="nombre">
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Descripción</label>
                        <textarea name="descripcion" class="form-control" id="exampleTextarea1"
                            rows="4">{{ old('descripcion', $categoria->descripcion) }}</textarea>
                    </div>
                    @if (isset($categoria->image->url))
                        <label for="exampleInputEmail3">Imagen actual</label>

                        <div class="form-group">
                            <img class="img-thumbnail img-fluid" style="height:100px;"
                                src="{{$categoria->image->url }}" alt="foto de imagen">
                        </div>
                    @endif
                    <div class="form-group">
                        <input type="file" name="imagen" id="Foto">
                     </div>
                     <div class="form-group">
                      <img id="FotoCargada" class="img-thumbnail img-fluid" style="max-width: 100px;">
                     
                    </div>
                   
          
{{-- importar js showImgLoaded --}}
<script src="{{ asset('assets/js/imagenes/showImgLoaded.js') }}"></script>


            <button type="submit" class="btn btn-primary mr-2">Guardar cambios</button>
            <button class="btn btn-light">Cancelar</button>
            </form>
        </div>
    </div>
    </div>

@endsection

