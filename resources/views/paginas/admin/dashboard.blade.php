<!DOCTYPE html>

<html lang="es">


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:54 GMT -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('dashboard/vendors/iconfonts/font-awesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('dashboard/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('dashboard/vendors/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('dashboard/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('dashboard/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">


      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('home.index')}}"
          style="font-weight:800; ">{{$empresa->nombre}}</a>
        <a class="navbar-brand brand-logo-mini" href="{{route('home.index')}}"><img
            src="{{asset('assets/images/car.png')}}" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav">
          {{-- <li class="nav-item nav-search d-none d-md-flex">
            <div class="nav-link">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-search"></i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Search" aria-label="Search">
              </div>
            </div>
          </li> --}}
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          {{-- <li class="nav-item d-none d-lg-flex">
            <a class="nav-link" href="#">
              <span class="btn btn-primary">+ Create new</span>
            </a>
          </li> --}}

          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href=""
              data-toggle="dropdown">
              <i class="fas fa-bell mx-0"></i>
              <span class="count">
                {{ auth()->user()->unreadNotifications->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
              aria-labelledby="notificationDropdown">
              @if (auth()->user()->unreadNotifications->count() > 0)
              <a class="dropdown-item" href="{{ route('notificacion.todas') }}">
                <p class="mb-0 font-weight-normal float-left">Tienes
                  {{ auth()->user()->unreadNotifications->count() }} nuevas notificaciones</p>

                <span class="badge badge-pill badge-warning float-right">
                  Ver todas
                </span>

              </a>
              @endif

              @foreach (auth()->user()->unreadNotifications as $notification)
              <div class="dropdown-divider"></div>
              @if($notification->type=="App\Notifications\NotificacionOrden")
              <a class="dropdown-item preview-item"
                href="{{ route('marcar_orden_leida', [$notification->id, $notification->data['id']]) }}">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-danger">
                    <i class="fas {{ $notification->data['icon'] }} mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium">
                    {{ $notification->data['titulo'] }}
                  </h6>
                  <p class="font-weight-light small-text">
                    {{ $notification->data['nombres'] }} ha realizado realizado una
                    compra de {{ $notification->data['cantidad'] }} productos por
                    {{ $notification->data['total'] }} USD.
                  </p>
                </div>
              </a>

              @endif

              @if($notification->type=="App\Notifications\NotificacionPedido")
              <a class="dropdown-item preview-item"
                href="{{ route('marcar_pedido_leido', [$notification->id, $notification->data['id']]) }}">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-danger">
                    <i class="fas {{ $notification->data['icon'] }} mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium">
                    {{ $notification->data['titulo'] }}
                  </h6>
                  <p class="font-weight-light small-text">
                    {{ $notification->data['nombre'] }} ha realizado realizado una
                    compra de {{ $notification->data['cantidad'] }} productos por
                    {{ $notification->data['total'] }} USD.
                  </p>
                </div>
              </a>

              @endif

              @endforeach

              </a>
            </div>
          </li>

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{asset('assets/images/avatar/avatar.png')}}" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              
              <a href="{{route('admin.perfilAdministracion')}}" class="dropdown-item">
                <i class="fas fa-cog text-primary"></i>
                Mi perfil
              </a>
             
              <div class="dropdown-divider"></div>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
              <a onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" class="dropdown-item">
                <i class="fas fa-power-off text-primary"></i>
                Cerrar sesión
              </a>
            </div>
          </li>
          {{-- <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="fas fa-ellipsis-h"></i>
            </a>
          </li> --}}
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->

      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close fa fa-times"></i>
        <ul class="nav nav-tabs" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
              aria-controls="todo-section" aria-expanded="false">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
              aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
            aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task-todo">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
              </ul>
            </div>
            <div class="events py-4 border-bottom px-3">
              <div class="wrapper d-flex mb-2">
                <i class="fa fa-times-circle text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
              <p class="text-gray mb-0">build a js based app</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="fa fa-times-circle text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="../../dashboard/images/faces/face1.jpg" alt="image"><span
                    class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../dashboard/images/faces/face2.jpg" alt="image"><span
                    class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../dashboard/images/faces/face3.jpg" alt="image"><span
                    class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('assets/images/avatar/avatar.png')}}" alt="image"><span
                    class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('assets/images/avatar/avatar.png')}}" alt="image"><span
                    class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../dashboard/images/faces/face6.jpg" alt="image"><span
                    class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->



      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image">
                <img style="margin-left:-20px;" src="{{asset('assets/images/avatar/avatar.png')}}" alt="image" />
              </div>
              <div class="profile-name">
                <p class="name" style="color:black;">
                  Bienvenido {{auth()->user()->name}} 
                </p>
                <p class="designation" style="color:black;!important">
                  @if(auth()->user()->getRoleNames()=='["Administrador"]')
                  Administrador
                  @elseif(auth()->user()->getRoleNames()=='["Vendedor"]')
                  Vendedor
                  @endif
                </p>
              </div>
            </div>
          </li>
          <li class="nav-item" data-toggle="collapse" href="" aria-expanded="false">
            <a class="nav-link" href="{{route('home.index')}}">
              <i class="fa fa-home menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Página de inicio</span>
            </a>
          </li>

        

          @if(auth()->user()->hasRole('Administrador'))
          <li class="nav-item">
            <a class="nav-link collapse" data-toggle="collapse" href="#page-layouts9" aria-expanded="false"
              aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Empresa</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts9">
              <ul class="nav flex-column sub-menu">
                <li class="newitem"> <a class="nav-link" href="{{route('empresa.empresaEditar')}}">Actualizar datos</a>
                </li>
              </ul>
            </div>
          </li>
          @endif

          @if(auth()->user()->hasRole('Vendedor'))
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts5" aria-expanded="false"
              aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Ventas</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts5">
              <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link"
                    href="{{route('admin.agregarVenta')}}">Agregar una venta</a></li>

                <li class="newitem"> <a class="nav-link" href="{{route('admin.misVentas')}}">Ver mis ventas</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts8" aria-expanded="false"
              aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Clientes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts8">
              {{-- <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link" href="{{route('admin.verClientes')}}">Ver
                    clientes</a></li>
              </ul> --}}
              <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link" href="{{route('admin.verAbonos')}}">Ver
                    abonos</a></li>
              </ul>
              {{-- <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link"
                    href="{{route('admin.creditosCancelados')}}">Crédito cancelado</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link"
                    href="{{route('admin.creditosPendientes')}}">Crédito pendiente</a></li>
              </ul> --}}
            </div>

          </li>

          @endif



          @if(auth()->user()->hasRole('Administrador'))
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#xs" aria-expanded="false" aria-controls="apps">
              {{-- <i class="fas fa-sitemap"></i> --}}
              <i class="fas fa-sitemap menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Categorías</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="xs">
              <ul class="nav flex-column sub-menu" style="list-style:none !important;">
                <li class="newitem d-none d-lg-block"> <a class="nav-link" href="{{route('categoria.create')}}">Agregar
                    categoría</a></li>
                <li class="newitem"> <a class="nav-link" href="{{route('categoria.index')}}">Ver categorías</a></li>

              </ul>
            </div>
          </li>



          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts3" aria-expanded="false"
              aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Inventarios</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts3">
              <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link" href="{{route('inventario.create')}}">Agregar
                    inventario</a></li>
                <li class="newitem"> <a class="nav-link" href="{{route('inventario.index')}}">Ver inventarios</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts2" aria-expanded="false"
              aria-controls="page-layouts">
              <i class="fas fa-key menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Productos</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts2">
              <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link" href="{{route('producto.create')}}">Agregar
                    producto</a></li>
                <li class="newitem"> <a class="nav-link" href="{{route('producto.index')}}">Ver productos</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts12" aria-expanded="false"
              aria-controls="page-layouts">
              <i class="fas fa-user-shield menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Vendedores</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts12">
              <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link"
                    href="{{route('admin.agregarVendedor')}}">Agregar
                    vendedor</a></li>
                <li class="newitem"> <a class="nav-link" href="{{route('admin.listarVendedores')}}">Ver vendedores</a>
                </li>
              </ul>
            </div>
          </li>

          @if(auth()->user()->hasRole('Administrador'))
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts8" aria-expanded="false"
              aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Clientes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts8">
              <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link" href="{{route('admin.verClientes')}}">Ver
                    clientes</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link" href="{{route('admin.verAbonos')}}">Ver
                    abonos</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link"
                    href="{{route('admin.creditosCancelados')}}">Crédito cancelado</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link"
                    href="{{route('admin.creditosPendientes')}}">Crédito pendiente</a></li>
              </ul>
            </div>

          </li>

          @endif
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts4" aria-expanded="false"
              aria-controls="page-layouts">
              <i class="fas fa-dolly menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Pedidos en linea</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts4">
              <ul class="nav flex-column sub-menu">
                <li class="newitem"> <a class="nav-link" href="{{route('admin.pedidos')}}">Por clientes</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="newitem"> <a class="nav-link" href="{{route('admin.pedidosVendedor')}}">Por vendedores</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts6" aria-expanded="false"
              aria-controls="page-layouts">
              <i class="fas fa-user-shield menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Miembros</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts6">
              <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link"
                    href="{{route('admin.agregarMiembro')}}">Agregar miembro</a></li>
                <li class="newitem"> <a class="nav-link" href="{{route('admin.listarMiembros')}}">Ver miembros</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts10" aria-expanded="false"
              aria-controls="page-layouts">
              <i class="fas fa-parachute-box menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Proveedores</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts10">
              <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link" href="{{route('proveedor.create')}}">Agregar
                    proveedor</a></li>
                <li class="newitem"> <a class="nav-link" href="{{route('proveedor.index')}}">Ver proveedores</a></li>
              </ul>
            </div>
          </li>




          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts11" aria-expanded="false"
              aria-controls="page-layouts">
              <i class="fas fa-money-bill menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Deudas</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts11">
              <ul class="nav flex-column sub-menu">
                <li class="newitem d-none d-lg-block"> <a class="nav-link" href="{{route('deuda.create')}}">Agregar
                    deuda</a></li>
                <li class="newitem"> <a class="nav-link" href="{{route('deuda.index')}}">Ver deudas</a></li>
                <li class="newitem"> <a class="nav-link" href="{{route('deuda.cancelada')}}">Deudas canceladas</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link"  href="{{route('admin.verMensajes')}}" 
              >
              <i class="fas fa-envelope menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Bandeja de mensajes</span>
              <i class="menu-arrow"></i>
            </a>
           
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts12" aria-expanded="false"
              aria-controls="page-layouts">
              <i class="fas fa-bell menu-icon" style="color:black;!important"></i>
              <span class="menu-title" style="color:black;!important">Notificaciones</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts12">
              <ul class="nav flex-column sub-menu">
                <li class="newitem"> <a class="nav-link" href="{{route('notificacion.todas')}}">Ver notificaciones</a>
                </li>
                {{-- <li class="newitem"> <a class="nav-link" href="{{route('deuda.cancelada')}}">Deudas canceladas</a>
                </li> --}}
              </ul>
            </div>
          </li>

         



          @endif







        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row grid-margin">
            <div class="col-12">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div class="statistics-item">
                      <p>
                        <a style="text-decoration:none; color: black;" class="nav-link"
                          href="{{route('admin.verClientes')}}"> <i class="icon-sm fa fa-user mr-2"></i>Clientes</a>
                      </p>
                      <h2>{{$clientes_count}}</h2>
                      <label class="badge badge-outline-success badge-pill"></label>
                    </div>
                    <div class="statistics-item">
                      <p>
                        <a style="text-decoration:none; color: black;" class="nav-link"
                          href="{{route('admin.listarMiembros')}}"> <i class="icon-sm fa fa-user mr-2"></i>Miembros</a>

                      </p>
                      <h2>{{$miembros_count}}</h2>
                      <label class="badge badge-outline-success badge-pill"></label>
                    </div>
                    <div class="statistics-item">
                      <p>
                        <a style="text-decoration:none; color: black;" class="nav-link"
                          href="{{route('producto.index')}}"> <i class="icon-sm fa fa-user mr-2"></i>Productos</a>

                      </p>
                      <h2>{{$productos_count}}</h2>
                      <label class="badge badge-outline-success badge-pill"></label>
                    </div>



                    <div class="statistics-item">
                      <p>
                        <i class="icon-sm fas fa-chart-line mr-2"></i>
                        Ganancias del mes actual
                      </p>
                      <h2>{{$ganancia}}</h2>
                      <label class="badge badge-outline-success badge-pill"></label>
                    </div>

                    <div class="statistics-item">
                      <p>
                        <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                        Ordenes pendientes
                      </p>
                      <h2>{{$ordenespendientes_count}}</h2>
                      <label class="badge badge-outline-danger badge-pill"></label>
                    </div>


                    <div class="statistics-item">
                      <p>
                        <a style="text-decoration:none; color: black;" class="nav-link" href="{{route('deuda.index')}}">
                          <i class="icon-sm fa fa-user mr-2"></i>Deudas pendientes</a>

                      </p>
                      <h2>{{$deudatotal}}</h2>
                      <label class="badge badge-outline-danger badge-pill"></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          @yield('contenido')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            {{-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a
                href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                class="far fa-heart text-danger"></i></span>
            --}}
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('dashboard/vendors/js/vendor.bundle.addons.js')}}"></script>
  <script src="{{asset('dashboard/js/off-canvas.js')}}"></script>
  <script src="{{asset('dashboard/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('dashboard/js/misc.js')}}"></script>
  <script src="{{asset('dashboard/js/settings.js')}}"></script>
  <script src="{{asset('dashboard/js/todolist.js')}}"></script>

  <script src="{{asset('dashboard/js/data-table.js')}}"></script> 
  @include('sweetalert::alert')
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:54 GMT -->

</html>