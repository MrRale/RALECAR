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
                    <h2>Registrarse</h2>
                    <ul>
                        <li><a href="{{route('home.index')}}">Inicio</a></li>
                        <li class="active">Registrarse</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->
        <!-- Begin Uren's Login Register Area -->

        {{-- @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" role="alert">
            <span aria-button="true">&times;</span>
        </button>
    </div>
@endif

        <div class="uren-login-register_area">
            <div class="container-fluid">
                <div class="row" style="display:flex; justify-content: center;">
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="login-form">
                                <h4 class="login-title text-center">Registrarse</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Nombre completo</label>
                                        <input type="text"  class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Cédula</label>
                                        <input type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>
                                   
                                @error('cedula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                    </div>

                                    <div class="col-md-6 col-12 mb--20">
                                        <label>RUC</label>
                                        <input type="text" class="form-control @error('ruc') is-invalid @enderror" name="ruc" value="{{ old('ruc') }}"  autocomplete="ruc" autofocus>
                                   
                                @error('ruc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                    </div>

                                    {{-- <div class="col-md-12">
                                        <label>Dirección</label>
                                        <input type="text"  class="@error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>
                                        @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div> --}}


                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Teléfono</label>
                                        <input type="tel" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                                   
                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                    </div>

                                    {{-- <div class="col-md-6 col-12 mb--20">
                                        <label>Empresa</label>
                                        <input type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" value="{{ old('empresa') }}" required autocomplete="empresa" autofocus>
                                   
                                @error('empresa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                    </div> --}}

                                    <div class="col-md-6">
                                        <label>Correo electrónico*</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Contraseña</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Confirmar contraseña</label>
                                        <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="col-12" style="display:flex; justify-content:center;">
                                        <button  type="submit" class="uren-register_btn">Registrarse</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                  
                </div>
            </div>
        </div>
        <!-- Uren's Login Register Area  End Here -->
        <!-- Begin Uren's Footer Area -->
        <div class="uren-footer_area">
          
            @include('vistas-parciales.footer')
            {{-- <div class="footer-middle_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="footer-widgets_info">
                                <div class="footer-widgets_logo">
                                    <a href="#">
                                        <img src="assets/images/menu/logo/1.png" alt="Uren's Footer Logo">
                                    </a>
                                </div>
                                <div class="widget-short_desc">
                                    <p>We are a team of designers and developers that create high quality HTML Template
                                        &
                                        Woocommerce, Shopify Theme.
                                    </p>
                                </div>
                                <div class="widgets-essential_stuff">
                                    <ul>
                                        <li class="uren-address"><span>Address:</span> The Barn,
                                            Ullenhall, Henley
                                            in
                                            Arden B578 5CC, England</li>
                                        <li class="uren-phone"><span>Call
                                                Us:</span> <a href="tel://+123123321345">+123 321 345</a>
                                        </li>
                                        <li class="uren-email"><span>Email:</span> <a
                                                href="mailto://info@yourdomain.com">info@yourdomain.com</a></li>
                                    </ul>
                                </div>
                                <div class="uren-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank"
                                                title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank"
                                                title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip"
                                                target="_blank" title="Google Plus">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank"
                                                title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="footer-widgets_area">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="footer-widgets_title">
                                            <h3>Information</h3>
                                        </div>
                                        <div class="footer-widgets">
                                            <ul>
                                                <li><a href="javascript:void(0)">About Us</a></li>
                                                <li><a href="javascript:void(0)">Delivery Information</a></li>
                                                <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                                <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="footer-widgets_title">
                                            <h3>Customer Service</h3>
                                        </div>
                                        <div class="footer-widgets">
                                            <ul>
                                                <li><a href="javascript:void(0)">Contact Us</a></li>
                                                <li><a href="javascript:void(0)">Returns</a></li>
                                                <li><a href="javascript:void(0)">Site Map</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="footer-widgets_title">
                                            <h3>Extras</h3>
                                        </div>
                                        <div class="footer-widgets">
                                            <ul>
                                                <li><a href="javascript:void(0)">About Us</a></li>
                                                <li><a href="javascript:void(0)">Delivery Information</a></li>
                                                <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                                <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="footer-widgets_title">
                                            <h3>My Account</h3>
                                        </div>
                                        <div class="footer-widgets">
                                            <ul>
                                                <li><a href="javascript:void(0)">My Account</a></li>
                                                <li><a href="javascript:void(0)">Order History</a></li>
                                                <li><a href="javascript:void(0)">Wish List</a></li>
                                                <li><a href="javascript:void(0)">Newsletter</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
           
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
