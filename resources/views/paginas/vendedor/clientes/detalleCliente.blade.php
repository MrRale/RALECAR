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
                                  Datos de cliente
                                </h3>
                                <nav aria-label="breadcrumb">
                                  <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Datos cliente</li>
                                  </ol>
                                </nav>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-lg-4 pl-lg-5">
                                            <div class="d-flex justify-content-between">
                                              <div>
                                                <h3>{{$cliente->name}}</h3>
                                                <div class="d-flex align-items-center">
                                                  <h5 class="mb-0 mr-2 text-muted text-center">{{$cliente->cedula}}</h5>
                                               
                                                </div>
                                              </div>
                                             
                                            </div>
                                            
                                           
                                          </div>

                                        <div class="col-lg-4">
                
                                          <div class="py-4">
                                          
                                            <p class="clearfix">
                                              <span class="float-left">
                                                Teléfono
                                              </span>
                                              <span class="float-right text-muted">
                                                {{$cliente->telefono}}
                                              </span>
                                            </p>
                                            <p class="clearfix">
                                              <span class="float-left">
                                                Correo electrónico
                                              </span>
                                              <span class="float-right text-muted">
                                                {{$cliente->email}}
                                              </span>
                                            </p>
                                           
                                            <p class="clearfix">
                                              <span class="float-left">
                                                Direccion
                                              </span>
                                              <span class="float-right text-muted">
                                                <a href="#">{{$cliente->direccion}}</a>
                                              </span>
                                            </p>

                                            <p class="clearfix">
                                                <span class="float-left">
                                                  Empresa
                                                </span>
                                                <span class="float-right text-muted">
                                                  <a href="#">{{$cliente->empresa}}</a>
                                                </span>
                                              </p>

                                          </div>
                                          
                                        </div>
                                     
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

@endsection