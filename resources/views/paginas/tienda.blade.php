<!doctype html>
<html class="no-js" lang="zxx">
@include('vistas-parciales.head')

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Loading Area -->
        {{-- <div class="loading">
            <div class="text-center middle">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div> --}}
        <!-- Loading Area End Here -->

        <!-- Begin Uren's Header Main Area -->
        @include('vistas-parciales.header')
        <!-- Uren's Header Main Area End Here -->

        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Tienda</h2>
                    <ul>
                        <li><a href="{{route('home.index')}}">Inicio</a></li>
                        <li class="active">Tienda</li>
                    </ul>
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
        <!-- Uren's Breadcrumb Area End Here -->

        <!-- Begin Uren's Shop Left Sidebar Area -->
        <div class="shop-content_wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-5 order-2 order-lg-1 order-md-1">
                        <div class="uren-sidebar-catagories_area">
                            <div class="category-module uren-sidebar_categories">
                                <div class="category-module_heading">
                                    <h5>Categorías</h5>
                                </div>
                                <div class="module-body">
                                    <ul class="module-list_item">
                                        <li>
                                            @foreach($productoscount as $pc)
                                            <a href="{{route('home.filtradoCategoria',$pc->categoria->id)}}">{{$pc->categoria->nombre}}<span>({{$pc->producto_count}})</span></a>
                                           @endforeach
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                            <div class="uren-sidebar_categories">
                                <div class="uren-categories_title">
                                    <h5>Precio</h5>
                                </div>
                                <div class="price-filter">
                                    {{-- <div id="slider-range"></div> --}}
                                    <div class="price-slider-amount">
                                        <form id="precio-form" action="{{ route('home.filtradoPrecio') }}" method="GET"
                                       >

                                        
                                        <div class="label-input">
                                            <label>precio : </label>
                                            <input type="text" class="precio" id="preciobusqueda" name="precio" placeholder="monto" />
                                        </div>
                                     
                                    </form>
                                        <!-- <button type="button">Filter</button> -->
                                    </div>
                                </div>
                            </div>
                           
                           
                        </div>
                       
                    </div>
                    <div class="col-lg-9 col-md-7 order-1 order-lg-2 order-md-2">
                        <div class="shop-toolbar">
                            <div class="product-view-mode">
                                <a class="grid-1" data-target="gridview-1" data-toggle="tooltip"
                                    data-placement="top" title="1">1</a>
                                <a class="grid-2" data-target="gridview-2" data-toggle="tooltip"
                                    data-placement="top" title="2">2</a>
                                <a class=" grid-3" data-target="gridview-3" data-toggle="tooltip"
                                    data-placement="top" title="3">3</a>
                                <a class="grid-4" data-target="gridview-4" data-toggle="tooltip"
                                    data-placement="top" title="4">4</a>
                                <a class="grid-5" data-target="gridview-5" data-toggle="tooltip"
                                    data-placement="top" title="5">5</a>
                                <a class="list" data-target="listview" data-toggle="tooltip"
                                    data-placement="top" title="List"><i class="fa fa-th-list"></i></a>
                            </div>
                            <div class="product-item-selection_area">
                                <div class="product-short">
                                    <label class="select-label">Ordenar por:</label>
                                  <form id="ordenar-form" action="{{route('home.ordenarProductos')}}" method="GET">
                                    <select id="orden" class="myniceselect nice-select orden"  onchange="ordenar();" name="orden" >
                                        <option value="1">Default</option>
                                        <option value="2">Nombre, A to Z</option>
                                        <option value="3">Nombre, Z to A</option>
                                        <option value="4">Precio, bajo a alto</option>
                                        <option value="5">Precio, alto a bajo</option>
                                    </select>
                                  </form>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="shop-product-wrap grid gridview-3 img-hover-effect_area row">
                        @foreach ($productos as $producto)
                        <div class="col-lg-4">
                            <div class="product-slide_item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a >
                                                @foreach ($producto->images->slice(0, 2) as $image)
                                                <img style="min-width:100%;" src="{{ $image->url }}"
                                                    class="{{ $loop->first ? 'primary-img' : 'secondary-img' }}"
                                                    alt="imagen del producto">
                                            @endforeach
                                            </a>
                                            @if($producto->esNuevo())
                                            <div class="sticker">
                                                <span class="sticker">Nuevo</span>
                                            </div>
                                            @endif
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a onclick="event.preventDefault();
                                                        document.getElementById('addcar{{$producto->id}}').submit();" class="uren-add_cart" href=""
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Añadir al carro"><i class="ion-bag"></i></a>
                                                    </li>
                                                    <form action="{{route('shopping_cart_details.store')}}" id="addcar{{$producto->id}}" method="POST" onsubmit="alert('hola');" class="d-none">
                                                        @csrf
                                                         <input type="hidden" name="cantidad" value="1" >
                                                         <input type="number" name="producto_id" value="{{$producto->id}}">
                                                     </form>
                                                    <li><a class="uren-wishlist" href="wishlist.html"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Añadir a deseados"><i
                                                                class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                   
                                                    <li class="quick-view-btn" data-toggle="modal"
                                                        data-target="#exampleModalCenter"><a onclick="cargarVista({{$producto}});"
                                                            href="javascript:void(0)" data-toggle="tooltip"
                                                            data-placement="top" title="Vista previa"><i
                                                                class="ion-android-open"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                               
                                                <h6><a class="product-name" href="single-product.html">{{$producto->nombre}}</a></h6>
                                                <p>Código: <a class="product-name" href="single-product.html">{{$producto->codigo}}</a></p>
                                                <div class="price-box">
                                                    <span class="new-price">${{$producto->precio}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-slide_item">
                                <div class="single-product">
                                    <div class="product-img">

                                        <a href="single-product.html">
                                            @foreach ($producto->images->slice(0, 2) as $image)
                                                <img src="{{ $image->url }}"
                                                    class="{{ $loop->first ? 'primary-img' : 'secondary-img' }}"
                                                    alt="imagen del producto">
                                            @endforeach
                                            
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                           
                                            <h6><a class="product-name" href="single-product.html">{{$producto->nombre}}</a></h6>
                                            <div class="price-box">
                                                <span class="new-price">${{$producto->precio}}</span>
                                            </div>
                                            <div class="product-short_desc">
                                                <p>{{$producto->descripcion}}.</p>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul>
                                                <li><a class="uren-add_cart" href="cart.html"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Añadir al carro"><i class="ion-bag"></i></a>
                                                </li>
                                                <li><a class="uren-wishlist" href="wishlist.html"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Añadir a deseados"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                </li>
                                                <li><a class="uren-add_compare" href="compare.html"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Comparar"><i
                                                            class="ion-android-options"></i></a>
                                                </li>
                                                <li class="quick-view-btn" data-toggle="modal"
                                                    data-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Vista previa"><i class="ion-android-open"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                          
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="uren-paginatoin-area">
                                    {!!$productos->links()!!}
                                    {{-- <div class="row">
                                        <div class="col-lg-12">
                                          
                                            <ul class="uren-pagination-box primary-color">
                                             
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Shop Left Sidebar Area End Here -->

        <!-- Begin Uren's Footer Area -->
        <div class="uren-footer_area">
            {{-- <div class="footer-top_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="newsletter-area">
                                <h3 class="title">Join Our Newsletter Now</h3>
                                <p class="short-desc">Get E-mail updates about our latest shop and special offers.
                                </p>
                                <div class="newsletter-form_wrap">
                                    <form
                                        action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef"
                                        method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                        class="newsletters-form validate" target="_blank" novalidate>
                                        <div id="mc_embed_signup_scroll">
                                            <div id="mc-form" class="mc-form subscribe-form">
                                                <input id="mc-email" class="newsletter-input" type="email"
                                                    autocomplete="off" placeholder="Enter your email" />
                                                <button class="newsletter-btn" id="mc-submit">Subscribe</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
         @include('vistas-parciales.footer')
           
        </div>
        <!-- Uren's Footer Area End Here -->
        <!-- Begin Uren's Modal Area -->
      
        <!-- Uren's Modal Area End Here -->

    </div>

    <!-- JS

        
============================================ -->
@include('vistas-parciales.modalView')

<script>
 function cargarVista(producto){
    producto = JSON.stringify(producto);
     producto = JSON.parse(producto);//para poder acceder a sus atributos
    //  const n = producto['images'].length;
    // alert(producto['images'][0]['url']);
    //  var contenedor = document.getElementById('contenedorimagenes');
    var imagen =  document.getElementById('imagenproducto');
    imagen.src = producto['images'][0]['url'];
    //  for(i=0; i<n ;i++){
    //     var objImagen = new Image();
    //      alert(producto['images'][i]['url']);
    //      objImagen.src=producto['images'][i]['url'];
    //     //  var todo = objImagen;
    //     alert('url del objeto imagen: '+objImagen.src);
    //      contenedor.append(objImagen);
    //  }
    
     var tituloproducto = document.getElementById('tituloproducto');
     var precioproducto = document.getElementById('precioproducto');
     var marcaproducto = document.getElementById('marcaproducto');
     var codigoproducto = document.getElementById('codigoproducto');
     var stockproducto = document.getElementById('stockproducto');
     var imagenproducto = document.getElementById('imagenproducto');
     tituloproducto.textContent = producto["nombre"];
     precioproducto.textContent = "$"+producto["precio"];
     marcaproducto.textContent = producto["marca"];
     codigoproducto.textContent = producto["codigo"];
     stockproducto.textContent = producto["stock"];
     //imagenproducto.src = producto["imagenes"]["url"];
     
//    alert(producto["nombre"]);
 }

</script>

    <!-- jQuery JS -->
    <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- Modernizer JS -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <!-- Popper JS -->
    <script src="{{asset('assets/js/vendor/popper.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>

    <!-- Slick Slider JS -->
    <script src="{{asset('assets/js/plugins/slick.min.js')}}"></script>
    <!-- Barrating JS -->
    <script src="{{asset('assets/js/plugins/jquery.barrating.min.js')}}"></script>
    <!-- Counterup JS -->
    <script src="{{asset('assets/js/plugins/jquery.counterup.js')}}"></script>
    <!-- Nice Select JS -->
    <script src="{{asset('assets/js/plugins/jquery.nice-select.js')}}"></script>
    <!-- Sticky Sidebar JS -->
    <script src="{{asset('assets/js/plugins/jquery.sticky-sidebar.js')}}"></script>
    <!-- Jquery-ui JS -->
    <script src="{{asset('assets/js/plugins/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.ui.touch-punch.min.js')}}"></script>
    <!-- Lightgallery JS -->
    <script src="{{asset('assets/js/plugins/lightgallery.min.js')}}"></script>
    <!-- Scroll Top JS -->
    <script src="{{asset('assets/js/plugins/scroll-top.js')}}"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="{{asset('assets/js/plugins/theia-sticky-sidebar.min.js')}}"></script>
    <!-- Waypoints JS -->
    <script src="{{asset('assets/js/plugins/waypoints.min.js')}}"></script>
    <!-- jQuery Zoom JS -->
    <script src="{{asset('assets/js/plugins/jquery.zoom.min.js')}}"></script>

    <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
    <!--
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>
-->

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script type="text/javascript">

function actualizar(e){
    // console.log(e.currentTarget.value);//valor ingresado
    $precio = document.getElementById('preciobusqueda');
    $precio.value = e.currentTarget.value;
    e.preventDefault();
    document.getElementById('precio-form').submit();
}

function ordenar(){
    document.getElementById("orden").value;
    document.getElementById('ordenar-form').submit();
}

    document.addEventListener('DOMContentLoaded', e => {
    document.querySelector('.precio').addEventListener('change',actualizar);
});
    </script>

</body>


</html>
