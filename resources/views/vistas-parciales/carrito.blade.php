<div class="offcanvas-minicart_wrapper" id="miniCart">
    <div class="offcanvas-menu-inner">
        <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
        <div class="minicart-content">
            <div class="minicart-heading">
                <h4>Carrito de compras</h4>
            </div>
            <ul class="minicart-list">
                @foreach($shopping_cart->shopping_cart_details as $shopping_cart_detail)
                        
                <li class="minicart-product">
                    <a class="product-item_remove" href="{{route('shoppingCartDetail.retirar',$shopping_cart_detail)}}"><i
                        class="ion-android-close"></i></a>
                    <div class="product-item_img">
                       
                        <img src="{{$shopping_cart_detail->producto->images->pluck('url')[0]}}" alt="Uren's Product Image">
                 
                       
                   </div>
                    <div class="product-item_content">
                        <a href="{{route('home.detalle',$shopping_cart_detail->producto)}}" class="product-item_title">{{$shopping_cart_detail->producto->nombre}}</a>
                        <br/>
                        <a href="{{route('home.detalle',$shopping_cart_detail->producto)}}" class="product-item_title">{{$shopping_cart_detail->producto->codigo}}</a>
                      
                        <span class="product-item_quantity">{{$shopping_cart_detail->cantidad}} x ${{$shopping_cart_detail->precio}}</span>
                    </div>
                </li>
                @endforeach
             
            </ul>
        </div>
        <div class="minicart-item_total">
            <span>Subtotal</span>
            <span class="ammount">${{$shopping_cart->total_precios()}}</span>
        </div>
        <div class="minicart-btn_area">
            <a href="{{route('shoppingcart.cesta')}}" class="uren-btn uren-btn_dark uren-btn_fullwidth">Ver carrito</a>
        </div>
        <div class="minicart-btn_area">
            @if(Auth::check() && Auth()->user()->hasRole('Cliente') )
            <a href="{{route('cliente.pasarela')}}" class="uren-btn uren-btn_dark uren-btn_fullwidth" disabled>Pagar</a>
            @endif
        </div>
    </div>
</div>