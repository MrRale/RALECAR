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
                    <h2>Contactanos</h2>
                    <ul>
                        <li><a href="{{route('home.index')}}">Inicio</a></li>
                        <li class="active">Contactanos</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->
        <!-- Begin Contact Main Page Area -->
        <div class="contact-main-page">
            <div class="container-fluid">
                <div id="google-map"></div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                        <div class="contact-page-side-content">
                            <h3 class="contact-page-title">Contactanos</h3>
                            <p class="contact-page-message">Telf: 0987869865 / 0985685108</p>
                            <div class="single-contact-block">
                                <h4><i class="fa fa-fax"></i> Dirección</h4>
                                <p>Quito-Ecuador, Quitumbe Calle Lirañan y Ñusta</p>
                            </div>
                            <div class="single-contact-block">
                                <h4><i class="fa fa-phone"></i> Teléfono</h4>
                                <p>Teléfono:   (09) 85685108</p>
                                <p>Teléfono 2: (09) 87869865</p>
                                
                            </div>
                            <div class="single-contact-block last-child">
                                <h4><i class="fa fa-envelope-o"></i> Correo electrónico</h4>
                                
                                <p>automotriz_rale@outlook.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                        <div class="contact-form-content">
                            <h3 class="contact-page-title">Envianos un mensaje</h3>
                            <div class="contact-form">
                                <form id="contact-form" action="{{route('home.contactanosMensaje')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Tu nombre <span class="required">*</span></label>
                                        <input type="text" name="nombre" id="nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tu correo electrónico <span class="required">*</span></label>
                                        <input type="email" name="email" id="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Teléfono <span class="required">*</span></label>
                                        <input type="telefono" name="telefono" id="telefono" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Asunto</label>
                                        <input type="text" name="asunto" id="asunto">
                                    </div>
                                    <div class="form-group form-group-2">
                                        <label>Tu mensaje</label>
                                        <textarea name="mensaje" id="mensaje"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" value="submit" id="submit" class="uren-contact-form_btn" name="submit">Enviar</button>
                                    </div>
                                </form>
                            </div>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Main Page Area End Here -->
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
    <!-- Begin Uren's Google Map Area -->
    <script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyChs2QWiAhnzz0a4OEhzqCXwx_qA9ST_lE"></script>

    <script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);
        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 12,
                scrollwheel: false,
                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(-0.299549569438856, -78.5472726020304), // Dirección de la empresa
                // How you would like to style the map.
                // This is where you would paste any style found on
                styles: [{
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#e9e9e9"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 29
                            },
                            {
                                "weight": 0.2
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 18
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#dedede"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                                "visibility": "on"
                            },
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [{
                                "saturation": 36
                            },
                            {
                                "color": "#333333"
                            },
                            {
                                "lightness": 40
                            }
                        ]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f2f2f2"
                            },
                            {
                                "lightness": 19
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 17
                            },
                            {
                                "weight": 1.2
                            }
                        ]
                    }
                ]
            };
            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('google-map');
            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);
            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(-0.299549569438856, -78.5472726020304),
                map: map,
                title: 'Limupa',
                animation: google.maps.Animation.BOUNCE
            });
        }
    </script>
    <!-- Uren's Google Map Area End Here -->

</body>


</html>