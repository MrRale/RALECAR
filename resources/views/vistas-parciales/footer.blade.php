<div class="uren-footer_area">

    <div class="footer-middle_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-widgets_info">
                        <div class="footer-widgets_logo">
                            <a href="#">
                                <img style="max-width:170px; margin-left:90px;" style="height:40px;" src="{{asset('/assets/images/logos/logo-automotriz-rale1-blanco.png')}}"
                                    alt="Uren's Footer Logo">
                            </a>
                        </div>
                        <div class="widget-short_desc">

                        </div>
                        <div class="widgets-essential_stuff">
                            <ul>
                                <li class="uren-address"><span>Dirección:</span>
                                    Quito-Quitumbe, calle Lirañan y Ñusta
                                </li>
                                <li class="uren-phone"><span>Contactanos:
                                    </span> <a href="tel://+123123321345">0985685108</a>
                                </li>
                                <li class="uren-email"><span>Correo electrónico:</span> <a
                                        href="mailto://automotriz_rale@hotmail.com">automotrizrale@gmail.com</a>
                                </li>
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
                                    <a style="background-color:green;" href="https://rss.com/" data-toggle="tooltip"
                                        target="_blank" title="Whatsapp">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="footer-widgets_area">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="footer-widgets_title">
                                    <h3>Información</h3>
                                </div>
                                <div class="footer-widgets">
                                    <ul>
                                        <li><a href="{{route('home.nosotros')}}">Acerca de nosotros</a></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="footer-widgets_title">
                                    <h3>Servicio al cliente</h3>
                                </div>
                                <div class="footer-widgets">
                                    <ul>
                                        <li><a href="{{route('home.contactanos')}}">Contactanos</a></li>

                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="footer-widgets_title">
                                    <h3>Mi cuenta</h3>
                                </div>
                                <div class="footer-widgets">
                                    <ul>
                                        @if(auth()->check())
                                        @if(auth()->user()->hasRole('Administrador'))
                                        <li><a href="{{route('cliente.perfil')}}">Mi perfil</a></li>
                                     @else
                                
                                     <li><a href="{{route('admin.perfilAdministracion')}}">Mi perfil</a></li>
                                     @endif
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom_area">
        <div class="container-fluid">
            <div class="footer-bottom_nav">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright">

                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>