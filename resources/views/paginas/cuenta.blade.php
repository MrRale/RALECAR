<!doctype html>
<html class="no-js" lang="zxx">

@include('vistas-parciales.head')

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Uren's Header Main Area -->
       @include('vistas-parciales.header')
        <!-- Uren's Header Main Area End Here -->

        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Mi perfil</h2>
                    <ul>
                        <li><a href="{{route('home.index')}}">Inicio</a></li>
                        <li class="active">Mi perfil</li>
                    </ul>
                </div>
            </div>
        </div>

        @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible text-center" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" role="alert">
                <span aria-button="true">&times;</span>
            </button>
        </div>
    @endif

        <!-- Uren's Breadcrumb Area End Here -->
        <!-- Begin Uren's Page Content Area -->
        <main class="page-content">
            <!-- Begin Uren's Account Page Area -->
            <div class="account-page-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                               
                                @if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Vendedor') )
                                <li class="nav-item">
                                    <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab" href="{{route('admin.dashboard')}}" role="tab" aria-controls="account-dashboard" aria-selected="true">Dashboard</a>
                                </li>
                                @endif
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Ordenes</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address" role="tab" aria-controls="account-address" aria-selected="false">Direcciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Detalles de cuenta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-logout-tab" href="" role="tab" aria-selected="false">Cerrar sesi??n</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                                <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                                    <div class="myaccount-dashboard">
                                        <p>Bienvenido <b>{{$user->name}}</b> (no eres {{$user->name}} ? <a href="{{route('logout')}}">Cerrar sesi??n</a>)</p>
                                        <p>A traves de tu cuenta tu podras visualizar tus ordenes, gestionar tus compras y  datos de facturaci??n <a href="javascript:void(0)">Edita tu contrase??a y detalles de tu cuenta</a>.</p>
                                    </div>
                                </div>
                               
                                <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
                                    <div class="myaccount-address">
                                        <p>Las siguientes direcciones se utilizar??n en la p??gina de pago de forma predeterminada.</p>
                                        <div class="row">
                                            <div class="col">
                                                <h4 class="small-title">DIRECCI??N DE ENV??O</h4>
                                                <address>
                                                    1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                                </address>
                                            </div>
                                            <div class="col">
                                                <h4 class="small-title">DIRECCI??N DE ENTREGA</h4>
                                                <address>
                                                    1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                                    <div class="myaccount-details">
                                        <form action="{{route('cliente.actualizarPerfil')}}" method="POST"  class="uren-form">
                                            @csrf
                                            {{-- cedula
                                                ruc
                                                telefono
                                                direccion
                                                empresa --}}
                                            <div class="uren-form-inner">
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-firstname">Nombre*</label>
                                                    <input type="text" name="name" id="account-details-firstname">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-firstname">C??dula*</label>
                                                    <input type="text" name="cedula" id="account-details-firstname">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-firstname">Tel??fono*</label>
                                                    <input type="text" name="telefono" id="account-details-firstname">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-firstname">Direcci??n*</label>
                                                    <input type="text" name="direccion" id="account-details-firstname">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-firstname">Empresa*</label>
                                                    <input type="text" name="empresa" id="account-details-firstname">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-email">Correo electr??nico*</label>
                                                    <input type="email" name="email" id="account-details-email">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-oldpass">Contrase??a actual (En blanco si no quiere cambiarla)</label>
                                                    <input type="password" name="password_actual" id="account-details-oldpass">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-newpass">Contrase??a nueva (En blanco si no quiere cambiarla)</label>
                                                    <input type="password" name="password_nueva" id="account-details-newpass">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-confpass">Confirmar nueva contrase??a</label>
                                                    <input type="password" name="password_nueva_confirm" id="account-details-confpass">
                                                </div>
                                                <div class="single-input" style="display:flex; justify-content:center;">
                                                    <button class="uren-btn uren-btn_dark" type="submit"><span>GUARDAR
                                                    CAMBIOS</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Uren's Account Page Area End Here -->
        </main>
        <!-- Uren's Page Content Area End Here -->
        <!-- Begin Uren's Footer Area -->
        <div class="uren-footer_area">
          
            @include('vistas-parciales.footer')
        
        </div>
        <!-- Uren's Footer Area End Here -->

    </div>

    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Barrating JS -->
    <script src="assets/js/plugins/jquery.barrating.min.js"></script>
    <!-- Counterup JS -->
    <script src="assets/js/plugins/jquery.counterup.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/jquery.nice-select.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Jquery-ui JS -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/jquery.ui.touch-punch.min.js"></script>
    <!-- Lightgallery JS -->
    <script src="assets/js/plugins/lightgallery.min.js"></script>
    <!-- Scroll Top JS -->
    <script src="assets/js/plugins/scroll-top.js"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="assets/js/plugins/theia-sticky-sidebar.min.js"></script>
    <!-- Waypoints JS -->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!-- jQuery Zoom JS -->
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>

    <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
    <!--
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>
-->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>