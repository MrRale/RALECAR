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
                    <h2>Detalle del producto</h2>
                    <ul>
                        <li><a href="{{route('home.index')}}">Inicio</a></li>
                        <li class="active">Detalle del producto</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->

        <!-- Begin Uren's Single Product Area -->
        <div class="sp-area">
            <div class="container-fluid">
                <div class="sp-nav">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="sp-img_area">
                                <div class="sp-img_slider slick-img-slider uren-slick-slider" data-slick-options='{
                                "slidesToShow": 1,
                                "arrows": false,
                                "fade": true,
                                "draggable": false,
                                "swipe": false,
                                "asNavFor": ".sp-img_slider-nav"
                                }'>
                                @foreach($producto->images as $imagen)
                                    <div class="single-slide red zoom">
                                        <img src="{{$imagen->url}}" alt="{{$producto->nombre}}">
                                    </div>
                                   @endforeach
                                </div>
                                <div class="sp-img_slider-nav slick-slider-nav uren-slick-slider slider-navigation_style-3"
                                    data-slick-options='{
                                "slidesToShow": 3,
                                "asNavFor": ".sp-img_slider",
                                "focusOnSelect": true,
                                "arrows" : true,
                                "spaceBetween": 30
                                }' data-slick-responsive='[
                                        {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                        {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":575, "settings": {"slidesToShow": 2}}
                                    ]'>
                                  
                                    @foreach($producto->images as $imagen)
                                    <div class="single-slide red">
                                        <img src="{{$imagen->url}}" alt="{{$producto->nombre}}">
                                    </div>
                                   @endforeach
                                 
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="sp-content">
                                <div class="sp-heading">
                                    <h5><a href="#">{{$producto->nombre}}</a></h5>
                                </div>
                                <span class="reference">Referencia:{{$producto->codigo}}</span>
                                <div class="rating-box">
                                    {{-- <ul>
                                        <li><i class="ion-android-star"></i></li>
                                        <li><i class="ion-android-star"></i></li>
                                        <li><i class="ion-android-star"></i></li>
                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                    </ul> --}}
                                </div>
                                <div class="sp-essential_stuff">
                                    <ul>
                                        <li>Marca <a>{{$producto->marca}}</a></li>
                                        <li>Código de producto: <a href="javascript:void(0)">{{$producto->codigo}}</a></li>
                                        <li>Disponibilidad: <a>En stock</a></li>
                                        <li>Precio: <a>${{$producto->precio}}</a></li>
                                    </ul>
                                </div>
                                {{-- <div class="product-size_box">
                                    <span>Size</span>
                                    <select class="myniceselect nice-select">
                                        <option value="1">S</option>
                                        <option value="2">M</option>
                                        <option value="3">L</option>
                                        <option value="4">XL</option>
                                    </select>
                                </div> --}}
                            <form action="{{route('shopping_cart_details.store')}}" id="addcar" method="POST" >
                                 @csrf
                                <div class="quantity">
                                    <label>Cantidad</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" max="{{$producto->stock}}" type="number" name="cantidad">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                
                                <input type="text" name="producto_id" value="{{$producto->id}}" class="d-none">
                            </form>
                                <div class="qty-btn_area">
                                    <ul>
                                        <li><a onclick="event.preventDefault();
                                            document.getElementById('addcar').submit();" class="qty-cart_btn" >Añadir al carro</a></li>
                                        <li><a class="qty-wishlist_btn" href="" data-toggle="tooltip"
                                                title="Agregar a deseados"><i
                                                    class="ion-android-favorite-outline"></i></a>
                                        </li>
                                
                                    </ul>
                                </div>
                                {{-- <div class="uren-tag-line">
                                    <h6>Etiquetas:</h6>
                                    <a href="javascript:void(0)">vehicle</a>,
                                    <a href="javascript:void(0)">car</a>,
                                    <a href="javascript:void(0)">bike</a>
                                </div> --}}
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
                                        <li class="youtube">
                                            <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank"
                                                title="Youtube">
                                                <i class="fab fa-youtube"></i>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Single Product Area End Here -->

        <!-- Begin Uren's Single Product Tab Area -->
        <div class="sp-product-tab_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sp-product-tab_nav">
                            <div class="product-tab">
                                <ul class="nav product-menu">
                                    <li><a class="active" data-toggle="tab"
                                            href="#description"><span>Descripción</span></a>
                                    </li>
                                   
                                    <li><a data-toggle="tab" href="#reviews"><span>Comentarios (1)</span></a></li>
                                </ul>
                            </div>
                            <div class="tab-content uren-tab_content">
                                <div id="description" class="tab-pane active show" role="tabpanel">
                                    <div class="product-description">
                                        <ul>
                                            <li>
                                                <strong>{{$producto->nombre}}</strong>
                                                <span>{{$producto->descripcion}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                              
                                <div id="reviews" class="tab-pane" role="tabpanel">
                                    <div class="tab-pane active" id="tab-review">
                                        <form action="{{route('cliente.comentar',$producto)}}" method="POST" class="form-horizontal" id="form-review">
                                            @csrf
                                            <div id="review">
                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                        @foreach ($producto->ratings as $rating)
                                                        <tr>
                                                            <td style="width: 50%;"><strong>{{$rating->user->name}}</strong></td>
                                                            <td class="text-right">{{$rating->created_at}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <p>{{$rating->comment}}</p>
                                                                <div class="rating-box">
                                                                    <ul style="display:flex; flex-direction:row;">
                                                                        @for ($i = 1; $i <=$rating->rating; $i++)
                                                                        <li><i class="ion-android-star"></i></li>
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <h2>Escribe un comentario</h2>
                                            <div class="form-group required">
                                                <div class="col-sm-12 p-0">
                                                    <label>Tu correo electrónico <span class="required">*</span></label>
                                                    <input class="review-input" type="email" name="con_email"
                                                        id="con_email" required>
                                                </div>
                                            </div>
                                            <div class="form-group required second-child">
                                                <div class="col-sm-12 p-0">
                                                    <label class="control-label">Compartenos tu opinión</label>
                                                    <textarea class="review-textarea" name="comentario"
                                                        id="con_message"></textarea>
                                                    {{-- <div class="help-block"><span
                                                            class="text-danger">Note:</span> HTML is not
                                                        translated!</div> --}}
                                                </div>
                                            </div>
                                            <div class="form-group last-child required">
                                                <div class="col-sm-12 p-0">
                                                    <div class="your-opinion">
                                                        <label>Tu valoración</label>
                                                        <span>
                                                            <select class="star-rating" name="valoracion">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="uren-btn-ps_right">
                                                    <button type="submit" class="uren-btn-2">Comentar</button>
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
        </div>
        <!-- Uren's Single Product Tab Area End Here -->

        <!-- Begin Uren's Product Area -->
        <div class="uren-product_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <span></span>
                            <h3>Productos relacionados</h3>
                        </div>
                        <div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area"
                            data-slick-options='{
                        "slidesToShow": 6,
                        "arrows" : true
                        }' data-slick-responsive='[
                                                {"breakpoint":1501, "settings": {"slidesToShow": 4}},
                                                {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                                                {"breakpoint":992, "settings": {"slidesToShow": 2}},
                                                {"breakpoint":767, "settings": {"slidesToShow": 1}},
                                                {"breakpoint":480, "settings": {"slidesToShow": 1}}
                                            ]'>
                                            @foreach ($producto->similar($producto) as $productorelacionado)
                                            <div class="product-slide_item">
                                                <div class="inner-slide">
                                                    <div class="single-product">
                                                        <div class="product-img">
                                                            <a href="single-product.html">
                                                                @foreach ($productorelacionado->images->slice(0, 2) as $image)
                                                                <img src="{{ $image->url }}"
                                                                    class="{{ $loop->first ? 'primary-img' : 'secondary-img' }}"
                                                                    alt="imagen del producto">
                                                            @endforeach
                                                            </a>
                                                            <div class="sticker">
                                                                <span class="sticker">Nuevo</span>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul>
                                                                    <li><a class="uren-add_cart" href="cart.html"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Add To Cart"><i class="ion-bag"></i></a>
                                                                    </li>
                                                                    <li><a class="uren-wishlist" href="wishlist.html"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Add To Wishlist"><i
                                                                                class="ion-android-favorite-outline"></i></a>
                                                                    </li>
                                                                    <li><a class="uren-add_compare" href="compare.html"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Compare This Product"><i
                                                                                class="ion-android-options"></i></a>
                                                                    </li>
                                                                    <li class="quick-view-btn" data-toggle="modal"
                                                                        data-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Quick View"><i class="ion-android-open"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <div class="product-desc_info">
                                                                <div class="rating-box">
                                                                    <ul>
                                                                        <li><i class="ion-android-star"></i></li>
                                                                        <li><i class="ion-android-star"></i></li>
                                                                        <li><i class="ion-android-star"></i></li>
                                                                        <li class="silver-color"><i class="ion-android-star"></i>
                                                                        </li>
                                                                        <li class="silver-color"><i class="ion-android-star"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <h6><a class="product-name" href="single-product.html">{{$productorelacionado->nombre}}</a></h6>
                                                                <div class="price-box">
                                                                    <span class="new-price">${{$productorelacionado->precio}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                           

                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Product Area End Here -->

  

        <!-- Begin Uren's Footer Area -->
        <div class="uren-footer_area">
            
      @include('vistas-parciales.footer')
      
        </div>
        <!-- Uren's Footer Area End Here -->
        <!-- Begin Uren's Modal Area -->
        <div class="modal fade modal-wrapper" id="exampleModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area sp-area row">
                            <div class="col-lg-5">
                                <div class="sp-img_area">
                                    <div class="sp-img_slider slick-img-slider uren-slick-slider" data-slick-options='{
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "fade": true,
                                    "draggable": false,
                                    "swipe": false,
                                    "asNavFor": ".sp-img_slider-nav"
                                    }'>
                                        <div class="single-slide red">
                                            <img src="assets/images/product/large-size/1.jpg"
                                                alt="Uren's Product Image">
                                        </div>
                                        <div class="single-slide orange">
                                            <img src="assets/images/product/large-size/2.jpg"
                                                alt="Uren's Product Image">
                                        </div>
                                        <div class="single-slide brown">
                                            <img src="assets/images/product/large-size/3.jpg"
                                                alt="Uren's Product Image">
                                        </div>
                                        <div class="single-slide umber">
                                            <img src="assets/images/product/large-size/4.jpg"
                                                alt="Uren's Product Image">
                                        </div>
                                        <div class="single-slide black">
                                            <img src="assets/images/product/large-size/5.jpg"
                                                alt="Uren's Product Image">
                                        </div>
                                        <div class="single-slide golden">
                                            <img src="assets/images/product/large-size/6.jpg"
                                                alt="Uren's Product Image">
                                        </div>
                                    </div>
                                    <div class="sp-img_slider-nav slick-slider-nav uren-slick-slider slider-navigation_style-3"
                                        data-slick-options='{
                                   "slidesToShow": 4,
                                    "asNavFor": ".sp-img_slider",
                                   "focusOnSelect": true,
                                   "arrows" : true,
                                   "spaceBetween": 30
                                  }' data-slick-responsive='[
                                    {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                                    {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                    {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                    {"breakpoint":575, "settings": {"slidesToShow": 2}}
                                ]'>
                                        <div class="single-slide red">
                                            <img src="assets/images/product/small-size/1.jpg"
                                                alt="Uren's Product Thumnail">
                                        </div>
                                        <div class="single-slide orange">
                                            <img src="assets/images/product/small-size/2.jpg"
                                                alt="Uren's Product Thumnail">
                                        </div>
                                        <div class="single-slide brown">
                                            <img src="assets/images/product/small-size/3.jpg"
                                                alt="Uren's Product Thumnail">
                                        </div>
                                        <div class="single-slide umber">
                                            <img src="assets/images/product/small-size/4.jpg"
                                                alt="Uren's Product Thumnail">
                                        </div>
                                        <div class="single-slide black">
                                            <img src="assets/images/product/small-size/5.jpg"
                                                alt="Uren's Product Thumnail">
                                        </div>
                                        <div class="single-slide golden">
                                            <img src="assets/images/product/small-size/6.jpg"
                                                alt="Uren's Product Thumnail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6">
                                <div class="sp-content">
                                    <div class="sp-heading">
                                        <h5><a href="#">Dolorem odio provident ut nihil</a></h5>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li class="silver-color"><i class="ion-android-star"></i></li>
                                            <li class="silver-color"><i class="ion-android-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price-box">
                                        <span class="new-price new-price-2">$194.00</span>
                                        <span class="old-price">$241.00</span>
                                    </div>
                                    <div class="sp-essential_stuff">
                                        <ul>
                                            <li>Brands <a href="javascript:void(0)">Buxton</a></li>
                                            <li>Product Code: <a href="javascript:void(0)">Product 16</a></li>
                                            <li>Reward Points: <a href="javascript:void(0)">100</a></li>
                                            <li>Availability: <a href="javascript:void(0)">In Stock</a></li>
                                            <li>EX Tax: <a href="javascript:void(0)"><span>$453.35</span></a></li>
                                            <li>Price in reward points: <a href="javascript:void(0)">400</a></li>
                                        </ul>
                                    </div>
                                    <div class="color-list_area">
                                        <div class="color-list_heading">
                                            <h4>Available Options</h4>
                                        </div>
                                        <span class="sub-title">Color</span>
                                        <div class="color-list">
                                            <a href="javascript:void(0)" class="single-color active"
                                                data-swatch-color="red">
                                                <span class="bg-red_color"></span>
                                                <span class="color-text">Red (+$150)</span>
                                            </a>
                                            <a href="javascript:void(0)" class="single-color"
                                                data-swatch-color="orange">
                                                <span class="burnt-orange_color"></span>
                                                <span class="color-text">Orange (+$170)</span>
                                            </a>
                                            <a href="javascript:void(0)" class="single-color"
                                                data-swatch-color="brown">
                                                <span class="brown_color"></span>
                                                <span class="color-text">Brown (+$120)</span>
                                            </a>
                                            <a href="javascript:void(0)" class="single-color"
                                                data-swatch-color="umber">
                                                <span class="raw-umber_color"></span>
                                                <span class="color-text">Umber (+$125)</span>
                                            </a>
                                            <a href="javascript:void(0)" class="single-color"
                                                data-swatch-color="black">
                                                <span class="black_color"></span>
                                                <span class="color-text">Black (+$125)</span>
                                            </a>
                                            <a href="javascript:void(0)" class="single-color"
                                                data-swatch-color="golden">
                                                <span class="golden_color"></span>
                                                <span class="color-text">Golden (+$125)</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <div class="uren-group_btn">
                                        <ul>
                                            <li><a href="cart.html" class="add-to_cart">Cart To Cart</a></li>
                                            <li><a href="cart.html"><i class="ion-android-favorite-outline"></i></a>
                                            </li>
                                            <li><a href="cart.html"><i class="ion-ios-shuffle-strong"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="uren-tag-line">
                                        <h6>Tags:</h6>
                                        <a href="javascript:void(0)">Ring</a>,
                                        <a href="javascript:void(0)">Necklaces</a>,
                                        <a href="javascript:void(0)">Braid</a>
                                    </div>
                                    <div class="uren-social_link">
                                        <ul>
                                            <li class="facebook">
                                                <a href="https://www.facebook.com/" data-toggle="tooltip"
                                                    target="_blank" title="Facebook">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="twitter">
                                                <a href="https://twitter.com/" data-toggle="tooltip" target="_blank"
                                                    title="Twitter">
                                                    <i class="fab fa-twitter-square"></i>
                                                </a>
                                            </li>
                                            <li class="youtube">
                                                <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank"
                                                    title="Youtube">
                                                    <i class="fab fa-youtube"></i>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Modal Area End Here -->
    </div>

    <!-- JS
============================================ -->

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

</body>


</html>
