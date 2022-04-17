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
                    <h2>Pasarela</h2>
                    <ul>
                        <li><a href="{{route('home.index')}}">Inicio</a></li>
                        <li class="active">Pasarela</li>
                    </ul>
                </div>
            </div>
        </div>

        @if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif


        <!-- Uren's Breadcrumb Area End Here -->
        <!-- Begin Uren's Checkout Area -->
        <div class="checkout-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                     
                    </div>
                </div>
                <form action="{{route('cliente.pagar')}}" method="POST">
                {{-- <form action="{{route('cliente.pagar')}}" method="POST"> --}}
                    @csrf
                <div class="row">
                    <div class="col-lg-6 col-12">
                        
                            <div class="checkbox-form">
                                <h3>Detalles de la compra</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="country-select clearfix">
                                            <label>Ciudad <span class="required">*</span></label>
                                            <select name="ciudad" class="myniceselect nice-select wide">
                                                <option data-display="Quito">Quito</option>
                                                <option value="SantoDomingo">Santo Domingo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Nombres completos<span class="required">*</span></label>
                                            <input placeholder="" name="nombres" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Apellidos completos <span class="required">*</span></label>
                                            <input placeholder="" name="apellidos" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Empresa</label>
                                            <input placeholder="" name="empresa"  type="text">
                                        </div>
                                    </div>
                                    

                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Correo electrónico <span class="required">*</span></label>
                                            <input placeholder="" value="{{$cliente->email}}" name="email" type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Dirección <span class="required">*</span></label>
                                            <input name="direccion" placeholder=""  type="text">
                                        </div>
                                    </div>
                                   
                                   
                                    {{-- <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Código postal<span class="required">*</span></label>
                                            <input placeholder="" name="codigopostal" type="text">
                                        </div>
                                    </div> --}}
                                   
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Descripción</label>
                                            <textarea rows="4" class="form-control" name="descripcion"
                                            placeholder="Descripción del pedido realizado"></textarea>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="checkout-form-list create-acc">
                                            <input id="cbox" type="checkbox">
                                            <label>Crear una cuenta?</label>
                                        </div>
                                        <div id="cbox-info" class="checkout-form-list create-account">
                                            <p>Create an account by entering the information below. If you are a returning
                                                customer please login at the top of the page.</p>
                                            <label>Contraseña <span class="required">*</span></label>
                                            <input placeholder="password" name="password" type="password">
                                        </div>
                                    </div> --}}
                                </div>
                          
                            </div>
                            
                        
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="your-order">
                            <h3>Tu carrito</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">Producto</th>
                                            <th class="cart-product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($shopping_cart->shopping_cart_details as $scd)
                                        <tr class="cart_item">
                                            <td class="cart-product-name">{{$scd->producto->nombre}}<strong class="product-quantity">
                                            × {{$scd->cantidad}}</strong></td>
                                            <td class="cart-product-total"><span class="amount">${{$scd->cantidad*$scd->precio}}</span></td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Subtototal</th>
                                            <td><span class="amount">${{$shopping_cart->total_precios()}}</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span class="amount">${{$shopping_cart->total_precios()}}</span></strong></td>
                                        </tr>
                                    </tfoot>
                                    <input type="hidden" id="total_precios" value="{{$shopping_cart->total_precios()}}">
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    {{-- <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="#payment-1">
                                                <h5 class="panel-title">
                                                    <a href="javascript:void(0)" class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Direct Bank Transfer.
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p>Make your payment directly into our bank account. Please use your Order
                                                        ID as the payment
                                                        reference. Your order won’t be shipped until the funds have cleared in
                                                        our account.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="#payment-2">
                                                <h5 class="panel-title">
                                                    <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Cheque Payment
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p>Make your payment directly into our bank account. Please use your Order
                                                        ID as the payment
                                                        reference. Your order won’t be shipped until the funds have cleared in
                                                        our account.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="#payment-3">
                                                <h5 class="panel-title">
                                                    <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        PayPal
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p>Make your payment directly into our bank account. Please use your Order
                                                        ID as the payment
                                                        reference. Your order won’t be shipped until the funds have cleared in
                                                        our account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    @if($shopping_cart->total_precios()==0)
                                        <div class="order-button-payment">
                                            <input value="Pagar" type="submit" disabled="true">
                                        </div>
                                    @else
                                    <div class="order-button-payment">
                                        {{-- <form method="post" action="{{route('pay')}}"> --}}
                                            {{-- @csrf --}}
                                            <input id="botonpagar" value="Pagar" type="submit">
                                        {{-- </form> --}}
                                       
                                    </div>
                                    @endif
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- Uren's Checkout Area End Here -->
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
    <script>
document.addEventListener('DOMContentLoaded', e => {
    let res = document.getElementById('total_precios').value;
            if(res==0)
                document.getElementById('botonpagar').disabled=true;
            else
                document.getElementById('botonpagar').disabled=false;
});
    </script>

</body>


</html>