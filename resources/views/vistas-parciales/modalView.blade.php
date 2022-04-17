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
                                    <img id="imagenproducto" src="assets/images/product/large-size/1.jpg" alt="Uren's Product Image">
                                </div>
                               
                            </div>
                            <div id="contenedorimagenes" class="sp-img_slider-nav slick-slider-nav uren-slick-slider slider-navigation_style-3"
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
                                    {{-- <img id="imagenproducto" src="assets/images/product/small-size/1.jpg" alt="Uren's Product Thumnail">
                                 --}}
                                </div>
                                
                          
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="sp-content">
                            <div class="sp-heading">
                                <h5><a id="tituloproducto" href="#">Dolorem odio provident ut nihil</a></h5>
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
                                <span class="new-price new-price-2" id="precioproducto">$194.00</span>
                                {{-- <span class="old-price">$241.00</span> --}}
                            </div>
                            <div class="sp-essential_stuff">
                                <ul>
                                    <li>Marca: <a href="javascript:void(0)" id="marcaproducto"></a></li>
                                    <li>Código: <a href="javascript:void(0)"id="codigoproducto"></a></li>
                                    <li>Stock: <a href="javascript:void(0)" id="stockproducto"></a></li>
                                    {{-- <li>EX Tax: <a href="javascript:void(0)"><span>$453.35</span></a></li> --}}
                                    {{-- <li>Price in reward points: <a href="javascript:void(0)">400</a></li> --}}
                                </ul>
                            </div>
                            <form action="{{route('shopping_cart_details.store')}}" id="addcar" method="POST" >
                                @csrf
                            <div class="quantity">
                                <label>Cantidad</label>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" type="text" name="cantidad">
                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                </div>
                            </div>
                            @if(isset($pd->id))
                            <input type="text" name="producto_id" value="{{$pd->id}}" class="d-none">
                            @else
                                @if(isset($producto->id))
                            <input type="text" name="producto_id" value="{{$producto->id}}" class="d-none">
                                @endif
                            @endif
                      
                        </form>
                            <div class="uren-group_btn">
                                <ul>
                                    <li><a onclick="event.preventDefault();
                                        document.getElementById('addcar').submit();"  class="add-to_cart">Añadir al carrito</a></li>
                                    <li><a title="Agregar a deseados" ><i class="ion-android-favorite-outline"></i></a></li>
                                    
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