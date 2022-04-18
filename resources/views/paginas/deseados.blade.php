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
                    <h2>Lista de deseados</h2>
                    <ul>
                        <li><a href="{{ route('home.index') }}">Inicio</a></li>
                        <li class="active">Deseados</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="uren-wishlist_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="uren-product-remove">Retirar</th>
                                        <th class="uren-product-thumbnail">Imagen</th>
                                        <th class="cart-product-descripcion">Tipo de producto</th>
                                        <th class="cart-product-codigo">Código del producto</th>
                                        <th class="uren-product-price">Precio unitario</th>
                                        <th class="uren-product-quantity">Disponibilidad</th>
                                        <th class="uren-product-subtotal">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td class="uren-product-remove"><a  href="{{route('deseado.eliminar',$producto->id)}}" ><i class="fa fa-trash"
                                                        title="Retirar"></i></a></td>
                                            <td class="uren-product-thumbnail"><a href=""><img style="max-width:70px;"
                                                        src="{{ $producto->images->pluck('url')[0] }}"
                                                        alt="Uren's Cart Thumbnail"></a></td>
                                            <td class="uren-product-descripcion"><a
                                                    href="{{ route('home.detalle', $producto) }}">{{ $producto->nombre }}</a>
                                            </td>
                                            <td class="uren-product-codigo"><a
                                                    href="{{ route('home.detalle', $producto) }}">{{ $producto->codigo }}</a>
                                            </td>


                                            <td class="uren-product-price"><span
                                                    class="amount">${{ $producto->precio }}</span></td>

                                            @csrf
                                            @if ($producto->stock > 0)

                                                <td class="uren-product-stock-status"><span class="in-stock">En
                                                        stock</span></td>

                                            @else
                                                <td class="uren-product-stock-status"><span
                                                        class="out-stock">Agotado</span></td>
                                            @endif


                                            <td class="uren-cart_btn"><a
                                                    onclick="event.preventDefault();
                                                        document.getElementById('addcar{{ $producto->id }}').submit();">Al carrito</a></td>
                                            <form action="{{ route('deseado.agregarCarrito')}}"
                                                id="addcar{{ $producto->id }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="cantidad" value="1">
                                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="uren-footer_area">
            @include('vistas-parciales.footer')
        </div>
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
