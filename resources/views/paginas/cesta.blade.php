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
                    <h2>Cesta de productos</h2>
                    <ul>
                        <li><a href="{{ route('home.index') }}">Inicio</a></li>
                        <li class="active">Cesta</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="uren-cart-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('shoppingcart.actualizar') }}" id="actualizarcarrito" method="POST">
                            <div class="table-content table-responsive"><table class="table">
                                    <thead>
                                        <tr><th class="uren-product-remove">Retirar</th>
                                            <th class="uren-product-thumbnail">Imagen</th>
                                            <th class="cart-product-descripcion">Tipo de producto</th>
                                            <th class="cart-product-codigo">Código del producto</th>
                                            <th class="uren-product-price">Precio unitario</th>
                                            <th class="uren-product-quantity">Cantidad</th>s
                                            <th class="uren-product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        @foreach ($shopping_cart->shopping_cart_details as $scd)
                                            <tr>


                                                <td class="uren-product-remove"><a
                                                        href="{{ route('shoppingCartDetail.retirar', $scd) }}"><i
                                                            class="fa fa-trash" title="Retirar"></i></a></td>
                                                <td class="uren-product-thumbnail"><a href=""><img
                                                            style="max-width:70px;"
                                                            src="{{ $scd->producto->images->pluck('url')[0] }}"
                                                            alt="Uren's Cart Thumbnail"></a></td>
                                                <td class="uren-product-descripcion"><a
                                                        href="{{ route('home.detalle', $scd->producto) }}">{{ $scd->producto->nombre }}</a>
                                                </td>
                                                <td class="uren-product-codigo"><a
                                                        href="{{ route('home.detalle', $scd->producto) }}">{{ $scd->producto->codigo }}</a>
                                                </td>


                                                <td class="uren-product-price"><span
                                                        class="amount">${{ $scd->precio }}</span></td>

                                                @csrf
                                                <td class="quantity">
                                                    <label>Cantidad</label>
                                                    <div class="cart-plus-minus">

                                                        <input class="cart-plus-minus-box" name="cantidad[]"
                                                            value="{{ $scd->cantidad }}" type="text">

                                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i>
                                                        </div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                    </div>
                                                </td>

                                                <td class="product-subtotal"><span
                                                        class="amount">${{ $scd->precio * $scd->cantidad }}</span>
                                                </td>

                                            </tr>
                                        @endforeach

                                       
                                    </tbody>
                                </table>
                                @if(count($shopping_cart->shopping_cart_details)==0)
                                <div style="display:flex; justify-content:center; align-items:center; margin-top:20px;">
                                    <h5>Aun no cuenta con productos en el carrito</h5>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">
                                        {{-- <div class="coupon">
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                        </div> --}}
                                        <div class="coupon2">
                                            <input type="submit" class="button" value="Actualizar carrito">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 ml-auto">
                    <div class="cart-page-total">
                        <h2>Total carrito</h2>
                        <ul>
                            <li>Subtotal <span>${{ $shopping_cart->total_precios() }}</span></li>
                            <li>Total <span>${{ $shopping_cart->total_precios() }}</span></li>
                        </ul>
                        @if(auth()->check())
                        @if(auth()->user()->hasRole('Cliente'))
                        <a href="{{ route('cliente.pasarela') }}">Proceder a pagar</a>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <!-- Uren's Cart Area End Here -->
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
