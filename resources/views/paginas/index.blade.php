<!doctype html>
<html class="no-js" lang="zxx">


@include('vistas-parciales.head')

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Uren's Header Main Area -->
        @include('vistas-parciales.header')
        <!-- Uren's Header Main Area End Here -->

        <div class="uren-slider_area uren-slider_area-3">
            <div class="main-slider slider-navigation_style-2">
                <!-- Begin Single Slide Area -->
                <div class="single-slide animation-style-01 bg-5">
                    <div class="slider-content">
                        <span class="carlet-text_color">25 años de expieriencia a tu servicio</span>
                        <h3>{{$empresa->nombre}}</h3>
                        <p class="short-desc">Conoce más sobre nosotros.
                        </p>
                        <div class="uren-btn-ps_center slide-btn">
                            <a class="uren-btn" href="{{route('home.nosotros')}}">Aquí</a>
                        </div>
                    </div>
                </div>
                <!-- Single Slide Area End Here -->
                <!-- Begin Single Slide Area -->
                <div class="single-slide animation-style-02 bg-6">
                    <div class="slider-content slider-content-2">
                        <span class="carlet-text_color">A un click de distancia</span>
                        <h3>Lo mejor en linea de frenos</h3>
                        <p class="short-desc">Explora y conoce nuestros productos
                        </p>
                        <div class="uren-btn-ps_center slide-btn">
                            <a class="uren-btn" href="{{route('home.tienda')}}">Aquí</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (Session::has('mensaje2'))
        <div class="alert alert-info alert-dismissible text-center" role="alert">
            {{ Session::get('mensaje2') }}
            <button type="button" class="close" data-dismiss="alert" role="alert">
                <span aria-button="true">&times;</span>
            </button>
        </div>
    @endif

        

        <!-- Begin Featured Categories Area -->
        @include('vistas-parciales.nuevosproductos')
    </div>
    </div>
   

    <!-- Begin Uren's Product Area -->
    @include('vistas-parciales.productosdestacados')
   

    @include('vistas-parciales.footer')
    <!-- Uren's Footer Area End Here -->
    <!-- Begin Uren's Modal Area -->
   
    <!-- Uren's Modal Area End Here -->

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
