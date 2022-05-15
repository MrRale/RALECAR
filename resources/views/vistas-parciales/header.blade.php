<header class="header-main_area header-main_area-2 header-main_area-3">
    <div class="header-middle_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2 col-md-4 col-sm-5">
                    <div class="header-logo_area" style="display:flex; flex-direction:row;">
                        <a href="{{route('home.index')}}">
                            <img style="max-width:130px; margin-left:100px;" src="{{asset('/assets/images/logos/logo-automotriz-rale.png')}}" alt="Uren's Logo">
                            {{-- <h2 style="font-size:12px;">{{$empresa->nombre}}</h2> --}}
                        </a>
                        
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                    <div class="hm-form_area">
                        <form action="{{route('home.filtrado')}}" method="GET" class="hm-searchbox">
                            
                            <input name="codigo" type="text" placeholder="Ingrese el código del producto a buscar ...">
                            <button class="header-search_btn" type="submit"><i
                                class="ion-ios-search-strong"><span>Buscar</span></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-9 col-sm-7">
                    <div class="header-right_area">
                        <ul>
                            <li class="mobile-menu_wrap d-flex d-lg-none">
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                    <i class="ion-navicon"></i>
                                </a>
                            </li>
                            <li class="minicart-wrap">
                                <a 
                                href="#miniCart" 
                                class="minicart-btn toolbar-btn">
                                    <div class="minicart-count_area">
                                        <span class="item-count">{{$shopping_cart->cantidad_de_productos()}}</span>
                                        <i class="ion-bag"></i>
                                    </div>
                                    <div class="minicart-front_text">
                                        <span>Carrito:</span>
                                        <span class="total-price">${{$shopping_cart->total_precios()}}</span>
                                    </div>
                                </a>
                            </li>
                            <li class="contact-us_wrap">
                                <a href="tel:+593{{$empresa->telefono}}"><i class="ion-android-call">{{$empresa->telefono}}</i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-top_area bg--primary">
        <div class="container-fluid">
            <div class="row">
                <div class="custom-category_col col-12">
                    <div class="category-menu category-menu-hidden">
                        <div class="category-heading">
                            <h2 class="categories-toggle">
                                <span>Comprar por</span>
                                <span>Categoría</span>
                            </h2>
                        </div>
                        <div id="cate-toggle" class="category-menu-list">
                            <ul>
                            @foreach($categorias as $categoria)
                                <li >
                                    <a href="{{route('home.filtradoCategoria',$categoria->id)}}">{{$categoria->nombre}}</a>
                            
                                </li>
                                @endforeach                            
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="custom-menu_col col-12 d-none d-lg-block">
                    <div class="main-menu_area position-relative">
                        <nav class="main-nav">
                            <ul>
                                <li class="dropdown-holder active"><a href="{{route('home.index')}}">Inicio</a>  
                                </li>
                                <li class="megamenu-holder "><a href="{{route('home.tienda')}}">Tienda <i
                                        ></i></a>
                                </li>
                                <li class=""><a href="{{route('home.nosotros')}}">Nosotros</a></li>
                                <li class=""><a href="{{route('home.contactanos')}}">Contactanos</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="custom-setting_col col-12 d-none d-lg-block">
                    <div class="ht-right_area">
                        <div class="ht-menu">
                            <ul>
                                @guest
                                @if (Route::has('login'))
                                <li class="active"><a href="{{route('login')}}">Iniciar sesión</a></li>
                                @endif
                                @if (Route::has('register'))
                                <li><a href="{{route('register')}}">Registrarse</a></li>
                                @endif
                                    @else
                                    <li><a >{{ Auth::user()->name }} <span class="fa fa-user"></span><i class="fa fa-chevron-down"></i></a>
                                        <ul class="ht-dropdown ht-my_account">
                                            @if(auth()->user()->hasRole('Vendedor') ||  auth()->user()->hasRole('Administrador'))
                                            <li><a href="{{route('admin.perfilAdministracion')}}">Mi perfil</a></li>
                                            @else
                                            <li><a href="{{route('cliente.perfil')}}">Mi perfil</a></li>
                                            @endif
                                            @if(auth()->user()->hasRole('Cliente'))
                                            <li><a href="{{route('deseado.index')}}">Deseados</a></li>
                                            @endif
                                        {{-- <li><a>Mi perfil</a></li> --}}
                                        @if (Auth::check() && ( Auth()->user()->hasRole('Administrador') || Auth()->user()->hasRole('Vendedor') ) )
                                                                            <li><a href="{{route('admin.dash')}}">Dashboard</a></li>
                                                                        @endif
                                        {{-- <li><a>Ordenes</a></li> --}}
 <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesión') }}
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="custom-search_col col-12 d-none d-md-block d-lg-none">
                    <div class="hm-form_area">
                        <form action="#" class="hm-searchbox">
                            <select class="nice-select select-search-category">
                                <option value="0">All Categories</option>
                                <option value="10">Laptops</option>
                                <option value="17">Prime Video</option>
                                <option value="20">All Videos</option>
                                <option value="21">Blouses</option>
                                <option value="22">Evening Dresses</option>
                                <option value="23">Summer Dresses</option>
                                <option value="24">T-shirts</option>
                                <option value="25">Rent or Buy</option>
                                <option value="26">Your Watchlist</option>
                                <option value="27">Watch Anywhere</option>
                                <option value="28">Getting Started</option>
                                <option value="18">Computers</option>
                                <option value="29">More to Explore</option>
                                <option value="30">TV &amp; Video</option>
                                <option value="31">Audio &amp; Theater</option>
                                <option value="32">Camera, Photo </option>
                                <option value="33">Cell Phones</option>
                                <option value="34">Headphones</option>
                                <option value="35">Video Games</option>
                                <option value="36">Wireless Speakers</option>
                                <option value="19">Electronics</option>
                                <option value="37">Amazon Home</option>
                                <option value="38">Kitchen &amp; Dining</option>
                                <option value="39">Furniture</option>
                                <option value="40">Bed &amp; Bath</option>
                                <option value="41">Appliances</option>
                                <option value="11">TV &amp; Audio</option>
                                <option value="42">Chamcham</option>
                                <option value="45">Office</option>
                                <option value="47">Gaming</option>
                                <option value="48">Chromebook</option>
                                <option value="49">Refurbished</option>
                                <option value="50">Touchscreen</option>
                                <option value="51">Ultrabooks</option>
                                <option value="52">Blouses</option>
                                <option value="43">Sanai</option>
                                <option value="53">Hard Drives</option>
                                <option value="54">Graphic Cards</option>
                                <option value="55">Processors (CPU)</option>
                                <option value="56">Memory</option>
                                <option value="57">Motherboards</option>
                                <option value="58">Fans &amp; Cooling</option>
                                <option value="59">CD/DVD Drives</option>
                                <option value="44">Meito</option>
                                <option value="60">Sound Cards</option>
                                <option value="61">Cases &amp; Towers</option>
                                <option value="62">Casual Dresses</option>
                                <option value="63">Evening Dresses</option>
                                <option value="64">T-shirts</option>
                                <option value="65">Tops</option>
                                <option value="12">Smartphone</option>
                                <option value="66">Camera Accessories</option>
                                <option value="68">Octa Core</option>
                                <option value="69">Quad Core</option>
                                <option value="70">Dual Core</option>
                                <option value="71">7.0 Screen</option>
                                <option value="72">9.0 Screen</option>
                                <option value="73">Bags &amp; Cases</option>
                                <option value="67">XailStation</option>
                                <option value="74">Batteries</option>
                                <option value="75">Microphones</option>
                                <option value="76">Stabilizers</option>
                                <option value="77">Video Tapes</option>
                                <option value="78">Memory Card Readers</option>
                                <option value="79">Tripods</option>
                                <option value="13">Cameras</option>
                                <option value="14">headphone</option>
                                <option value="15">Smartwatch</option>
                                <option value="16">Accessories</option>
                            </select>
                            <input type="text" placeholder="Enter your search key ...">
                            <button class="header-search_btn" type="submit"><i
                                class="ion-ios-search-strong"><span>Search</span></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="header-top_area header-sticky bg--primary">
         <div class="container-fluid">
            <div class="row" style="height:55px;">
                <div class="custom-category_col col-12">
                    <div class="category-menu category-menu-hidden">
                        <div class="category-heading">
                            <h2 class="categories-toggle">
                                <span>Comprar por</span>
                                <span>Categoría</span>
                            </h2>
                        </div>
                        <div id="cate-toggle" class="category-menu-list">
                            <ul>
                                @foreach($categorias as $categoria)
                                <li >
                                    <a href="{{route('home.filtradoCategoria',$categoria->id)}}">{{$categoria->nombre}}</a>
                            
                                </li>
                                @endforeach     
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="custom-menu_col col-12 d-none d-lg-block">
                    <div class="main-menu_area position-relative">
                        <nav class="main-nav">
                            <ul>
                                <li class="dropdown-holder active"><a href="{{route('home.index')}}">Inicio</a>
                                  
                                </li>
                                <li class="dropdown-holder active"><a href="{{route('home.tienda')}}">Tienda</a>
                                  
                          
                              
                                <li class=""><a href="{{route('home.nosotros')}}">Nosotros</a></li>
                                <li class=""><a href="{{route('home.contactanos')}}">Contactanos</a></li>
                           
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="custom-setting_col col-12 d-none d-lg-block">
                    <div class="ht-right_area">
                        <div class="ht-menu">
                            <ul>
                                @guest
                                @if (Route::has('login'))
                                <li class="active"><a href="{{route('login')}}">Iniciar sesión</a></li>
                                @endif
                                @if (Route::has('register'))
                                <li><a href="{{route('register')}}">Registrarse</a></li>
                                @endif
                                    @else
                                    <li><a href="">{{ Auth::user()->name }} <span class="fa fa-user"></span><i class="fa fa-chevron-down"></i></a>
                                        <ul class="ht-dropdown ht-my_account">
                                            @if(auth()->user()->hasRole('Vendedor') ||  auth()->user()->hasRole('Administrador'))
                                            <li><a href="{{route('admin.perfilAdministracion')}}">Mi perfil</a></li>
                                            @else
                                            <li><a href="{{route('cliente.perfil')}}">Mi perfil</a></li>
                                            @endif
                                            @if(auth()->user()->hasRole('Cliente'))
                                            <li><a href="{{route('deseado.index')}}">Deseados</a></li>
                                            @elseif(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Vendedor'))
                                            <li><a href="{{route('admin.dash')}}">Dashboard</a></li>
                                            @endif  
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesión') }}
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="custom-search_col col-12 d-none d-md-block d-lg-none">
                    <div class="hm-form_area">
                        <form action="#" class="hm-searchbox">
                            <select class="nice-select select-search-category">
                                <option value="0">All Categories</option>
                                <option value="10">Laptops</option>
                                <option value="17">Prime Video</option>
                                <option value="20">All Videos</option>
                                <option value="21">Blouses</option>
                                <option value="22">Evening Dresses</option>
                                <option value="23">Summer Dresses</option>
                                <option value="24">T-shirts</option>
                                <option value="25">Rent or Buy</option>
                                <option value="26">Your Watchlist</option>
                                <option value="27">Watch Anywhere</option>
                                <option value="28">Getting Started</option>
                                <option value="18">Computers</option>
                                <option value="29">More to Explore</option>
                                <option value="30">TV &amp; Video</option>
                                <option value="31">Audio &amp; Theater</option>
                                <option value="32">Camera, Photo </option>
                                <option value="33">Cell Phones</option>
                                <option value="34">Headphones</option>
                                <option value="35">Video Games</option>
                                <option value="36">Wireless Speakers</option>
                                <option value="19">Electronics</option>
                                <option value="37">Amazon Home</option>
                                <option value="38">Kitchen &amp; Dining</option>
                                <option value="39">Furniture</option>
                                <option value="40">Bed &amp; Bath</option>
                                <option value="41">Appliances</option>
                                <option value="11">TV &amp; Audio</option>
                                <option value="42">Chamcham</option>
                                <option value="45">Office</option>
                                <option value="47">Gaming</option>
                                <option value="48">Chromebook</option>
                                <option value="49">Refurbished</option>
                                <option value="50">Touchscreen</option>
                                <option value="51">Ultrabooks</option>
                                <option value="52">Blouses</option>
                                <option value="43">Sanai</option>
                                <option value="53">Hard Drives</option>
                                <option value="54">Graphic Cards</option>
                                <option value="55">Processors (CPU)</option>
                                <option value="56">Memory</option>
                                <option value="57">Motherboards</option>
                                <option value="58">Fans &amp; Cooling</option>
                                <option value="59">CD/DVD Drives</option>
                                <option value="44">Meito</option>
                                <option value="60">Sound Cards</option>
                                <option value="61">Cases &amp; Towers</option>
                                <option value="62">Casual Dresses</option>
                                <option value="63">Evening Dresses</option>
                                <option value="64">T-shirts</option>
                                <option value="65">Tops</option>
                                <option value="12">Smartphone</option>
                                <option value="66">Camera Accessories</option>
                                <option value="68">Octa Core</option>
                                <option value="69">Quad Core</option>
                                <option value="70">Dual Core</option>
                                <option value="71">7.0 Screen</option>
                                <option value="72">9.0 Screen</option>
                                <option value="73">Bags &amp; Cases</option>
                                <option value="67">XailStation</option>
                                <option value="74">Batteries</option>
                                <option value="75">Microphones</option>
                                <option value="76">Stabilizers</option>
                                <option value="77">Video Tapes</option>
                                <option value="78">Memory Card Readers</option>
                                <option value="79">Tripods</option>
                                <option value="13">Cameras</option>
                                <option value="14">headphone</option>
                                <option value="15">Smartwatch</option>
                                <option value="16">Accessories</option>
                            </select>
                            <input type="text" placeholder="Enter your search key ...">
                            <button class="header-search_btn" type="submit"><i
                                class="ion-ios-search-strong"><span>Search</span></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @include('vistas-parciales.carrito')

    <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                <div class="offcanvas-inner_search">
                    <form action="{{route('home.filtrado')}}" method="GET" class="inner-searchbox">
                        <input type="text" name="codigo" placeholder="Ingrese el código del producto a buscar ...">
                        <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <nav class="offcanvas-navigation">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children active"><a href="{{route('home.index')}}"><span
                                class="mm-text">Inicio</span></a>
                          
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{route('home.tienda')}}">
                                <span class="mm-text">Tienda</span>
                            </a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{route('home.nosotros')}}">
                                <span class="mm-text">Nosotros</span>
                            </a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{route('home.contactanos')}}">
                                <span class="mm-text">Contactanos</span>
                            </a>
                        </li>
                     
                        @if(auth()->check())
                        @if(auth()->user()->hasRole('Vendedor') ||  auth()->user()->hasRole('Administrador'))
                        <li class="menu-item-has-children">
                            <a href="{{route('admin.perfilAdministracion')}}">
                                <span class="mm-text">Mi perfil</span>
                            </a>
                        </li>
                        @else
                        <li class="menu-item-has-children">
                            <a href="{{route('cliente.perfil')}}">
                                <span class="mm-text">Mi perfil</span>
                            </a>
                        </li>
                        @endif

                        @endif

                        <li class="menu-item-has-children">
                            <a href="{{route('login')}}">
                                <span class="mm-text">Iniciar sesión</span>
                            </a>
                        </li>

                        <li class="menu-item-has-children">
                            <a href="{{route('register')}}">
                                <span class="mm-text">Registrarse</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>