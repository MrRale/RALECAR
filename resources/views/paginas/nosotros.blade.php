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
                    <h2>Acerca de nosotros</h2>
                    <ul>
                        <li><a href="{{route('home.index')}}">Inicio</a></li>
                        <li class="active">Acerca de nosotros</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->
        <!-- Begin Uren's About Us Area -->
        <div class="about-us-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-5">
                        <div class="overview-img text-center img-hover_effect">
                            <a href="#">
                                <img class="img-full" src="assets/images/about-us/1.jpg" alt="Uren's About Us Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7 d-flex align-items-center">
                        <div class="overview-content">
                            <h2>Bienvenido a <span> Automotriz R.A.L.E</span></h2>
                            <p class="short_desc">Somos una empresa con más de 25 años de expierncia en la línea de frenos para tu vehículo a nivel nacional. Los cuales garantizamos nuestro servicio, en nuestra línea de productos con la mejor calidad y a excelentes precios. </p>
                            <div class="uren-about-us_btn-area">
                                <a class="about-us_btn" href="{{route('home.tienda')}}">Compra ahora!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's About Us Area End Here -->

        <!-- Begin Uren's Project Countdown Area -->
        {{-- <div class="project-count-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-count text-center">
                            <div class="count-icon">
                                <span class="ion-ios-briefcase-outline"></span>
                            </div>
                            <div class="count-title">
                                <h2 class="count">2169</h2>
                                <span>Project Done</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-count text-center">
                            <div class="count-icon">
                                <span class="ion-ios-wineglass-outline"></span>
                            </div>
                            <div class="count-title">
                                <h2 class="count">869</h2>
                                <span>Awards Winned</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-count text-center">
                            <div class="count-icon">
                                <span class="ion-ios-lightbulb-outline"></span>
                            </div>
                            <div class="count-title">
                                <h2 class="count">689</h2>
                                <span>Hours Worked</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-count text-center">
                            <div class="count-icon">
                                <span class="ion-happy-outline"></span>
                            </div>
                            <div class="count-title">
                                <h2 class="count">2169</h2>
                                <span>Happy Customer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Uren's Project Countdown Area End Here -->

        <!-- Begin Uren's Team Area -->
        <div class="team-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title-2">
                            <h3>Nuestro Equipo</h3>
                        </div>
                    </div>
                </div> <!-- section title end -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member">
                            <div class="team-thumb img-hover_effect">
                                <a href="#">
                                    <img src="assets/images/about-us/team/1.jpg" alt="Our Team Member">
                                </a>
                            </div>
                            <div class="team-content text-center">
                                <h3>Ruben Rodriguez</h3>
                                <p>Gerente de la empresa</p>
                                <a href="#">klirinrube17090@hotmail.com</a>
                                <div class="uren-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                                                     
                                
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end single team member -->
                    {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member">
                            <div class="team-thumb img-hover_effect">
                                <a href="#">
                                    <img src="assets/images/about-us/team/2.jpg" alt="Our Team Member">
                                </a>
                            </div> --}}
                            {{-- <div class="team-content text-center">
                                <h3>Anny Adams</h3>
                                <p>Web Designer</p>
                                <a href="#">info@example.com</a>
                                <div class="uren-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="Youtube">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end single team member -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member">
                            <div class="team-thumb img-hover_effect">
                                <a href="#">
                                    <img src="assets/images/about-us/team/3.jpg" alt="Our Team Member">
                                </a>
                            </div>
                            <div class="team-content text-center">
                                <h3>Edvin Adams</h3>
                                <p>Content Writer</p>
                                <a href="javascript:void(0)">info@example.com</a>
                                <div class="uren-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="Youtube">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end single team member -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member">
                            <div class="team-thumb img-hover_effect">
                                <a href="#">
                                    <img src="assets/images/about-us/team/4.jpg" alt="Our Team Member">
                                </a>
                            </div>
                            <div class="team-content text-center">
                                <h3>Eddy Adams</h3>
                                <p>Marketing officer</p>
                                <a href="#">info@example.com</a>
                                <div class="uren-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="Youtube">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end single team member -->
                </div>
            </div>
        </div>
        <!-- Uren's Team Area End Here -->

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