@extends('paginas.admin.dashboard')

@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Cliente
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cliente</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"></h4>
      <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ordenes</h4>
                 
                    <div class="list-wrapper">
                        <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                            @foreach($cliente->ordenes as $orden)
                            <li>
                                <div class="form-check form-check-flat">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Orden #{{$orden->id}}
                                    </label>
                                </div>
                                <i class="remove fas fa-eye"></i>
                            </li>
                                @endforeach              
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card text-center">
                <div class="card-body">
                   <h3>Información</h3>
                    <h4>{{$cliente->name}}</h4>
                    <p class="text-muted">{{$cliente->getRoleNames()}}</p>
                    <p class="mt-4 card-text">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            Aenean commodo ligula eget dolor. Lorem
                    </p>
                    <button class="btn btn-info btn-sm mt-3 mb-4">Follow</button>
                    <div class="border-top pt-3">
                        <div class="row">
                            <div class="col-4">
                                <h6>5896</h6>
                                <p>Post</p>
                            </div>
                            <div class="col-4">
                                <h6>1596</h6>
                                <p>Followers</p>
                            </div>
                            <div class="col-4">
                                <h6>7896</h6>
                                <p>Likes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Updates</h4>
                    <ul class="solid-bullet-list">
                        <li>
                            <h6>User confirmation</h6>
                            <p>Lorem Ipsum is simply dummy text of the printing </p>
                            <p class="text-muted">
                                <i class="far fa-clock"></i>
                                7 months ago.
                            </p>
                        </li>
                        <li>
                            <h6>Continuous evaluation</h6>
                            <p>Lorem Ipsum is simply dummy text of the printing </p>
                            <p class="text-muted">
                                <i class="far fa-clock"></i>
                                7 months ago.
                            </p>
                        </li>
                        <li>
                            <h6>Promotion</h6>
                            <p>Lorem Ipsum is simply dummy text of the printing </p>
                            <p class="text-muted">
                                <i class="far fa-clock"></i>
                                7 months ago.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>

  


  
 
@endsection