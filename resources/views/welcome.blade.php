<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icono -->
    <link rel="icon" href="{{asset('/icon.png')}}" type="image/png" />
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}" />


    <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if ($pagina == 'invitados' || $pagina == 'index') {
        echo '<link rel="stylesheet" href="css/colorbox.css">';
    } else if ($pagina == 'conferencia') {
        echo '<link rel="stylesheet" href="css/lightbox.css">';
    }
    ?>


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Oswald:wght@300;400;700&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <meta name="theme-color" content="#fafafa">
    <script src="https://kit.fontawesome.com/1a2bd5a108.js" crossorigin="anonymous"></script>




</head>

<body class="<?php echo $pagina ?>">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if (session('status'))
      <script>
          Swal.fire({
          position: 'top-center',
          icon: 'success',
          title: 'Gracias! El pago se ha realizado correctamente',
          showConfirmButton: false,
          timer: 2500
          });
      </script>
  @endif

    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </ul>
                </nav>
                <div class="informacion-evento">
                    <div class="clearfix">
                        <p class="fecha"><i class="fa fa-calendar" aria-hidden="true"></i> 01-02 Julio</p>
                        <p class="ciudad"><i class="fa fa-map-marker" aria-hidden="true"></i> Huancayo, Perú</p>
                    </div>

                    <h1 class="nombre-sitio">Xonference</h1>
                    <p class="slogan">Los mejores congresos de <span>Ingeniería</span></p>
                </div>
                <!--.informacion-evento-->

            </div>
        </div>
        <!--.hero-->
    </header>


    <div class="barra">
        <div class="contenedor clearfix">
            <div class="logo">
                <a href="{{route('prin.welcome')}}">
                    <img src="img/logo.svg" alt="logo del app congreso">
                </a>
            </div>

            <div class="menu-movil">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="navegacion-principal clearfix">
                <a href="{{route('catalogo')}}">Conferencia</a>
                <a href="{{route('calendario')}}">Calendario</a>
                <a href="{{route('invitados')}}">Invitados</a>
                <a href="{{route('registrar')}}">Registrarse</a>
                <a href="{{route('usuario.login')}}">Iniciar sesion</a>
            </nav>
        </div>
        <!--.contenedor-->
    </div>
    <!--.barra-->


    <section class="seccion contenedor">
        <h2>La mejor conferencia de diseño web en español</h2>
        <p>
            Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula.
            Morbi porttitor tempus euismod.
        </p>
    </section>
    <!--seccion-->


    <section class="programa">
        <div class="contenedor-video">
            <video autoplay loop poster="img/bg-talleres.jpg">
                <source src="video/video.mp4" type="video/mp4">
                <source src="video/video.webm" type="video/webm">
                <source src="video/video.ogv" type="video/ogg">
            </video>
        </div>
        <!--.contenedor-video-->
        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>Programa del Evento</h2>

                    <nav class="menu-programa">
                        <a href="#seminario">
                            <i class="fa fa-university" aria-hidden="true"></i> Seminario </a>
                        <a href="#conferencias">
                            <i class="fa fa-comment" aria-hidden="true"></i> Conferencias </a>
                        <a href="#talleres">
                            <i class="fa fa-code" aria-hidden="true"></i> Talleres </a>

                    </nav>


                    <div id="seminario" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>Diseño UI y UX para móviles</h3>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 10:00:00</p>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i> 2016-12-09</p>
                            <p><i class="fa fa-user" aria-hidden="true"></i> Susan Sanchez</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>Angular 5</h3>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 19:00:00</p>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i> 2016-12-10</p>
                            <p><i class="fa fa-user" aria-hidden="true"></i> Juan Sanchez</p>
                        </div>
                        <a href="{{route('calendario')}}" class="button float-right">Ver todos</a>
                    </div>
                    <!--#talleres-->

                    <div id="conferencias" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>Como ser freelancer</h3>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 10:00:00</p>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i> 2016-12-09</p>
                            <p><i class="fa fa-user" aria-hidden="true"></i> Susan Sanchez</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>Tecnologías del Futuro PHP</h3>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 05:00:00</p>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i> 2016-12-09</p>
                            <p><i class="fa fa-user" aria-hidden="true"></i> Juan Sanchez</p>
                        </div>
                        <a href="{{route('catalogo')}}" class="button float-right">Ver todos</a>
                    </div>
                    <!--#talleres-->

                    <div id="talleres" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>HTML5 y CSS3</h3>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 02:00:00</p>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i> 2016-12-09</p>
                            <p><i class="fa fa-user" aria-hidden="true"></i> Juan Sanchez</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>WordPress</h3>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 19:00:00</p>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i> 2016-12-09</p>
                            <p><i class="fa fa-user" aria-hidden="true"></i> Harold Garcia</p>
                        </div>
                        <a href="{{route('catalogo')}}" class="button float-right">Ver todos</a>
                    </div>
                    <!--#talleres-->

                </div>
                <!--.programa-evento-->
            </div>
            <!--.contenedor-->
        </div>
        <!--.contenido-programa-->
    </section>
    <!--.programa-->

    <section class="invitados contenedor seccion">
        <h2>Nuestros Ponentes</h2>
        <ul class="lista-invitados clearfix">


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado1">
                        <img src="/img/ponentes/invitado1.jpg" alt="Imagen invitado">
                        <p>Rafael Bautista</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="invitado1">
                    <h2>Rafael </h2>
                    <img src="img/ponentes/invitado1.jpg" alt="">
                    <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.</p>
                </div>

            </div>


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado2">
                        <img src="/img/ponentes/invitado2.jpg" alt="Imagen invitado">
                        <p>Shari Herrera</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="invitado2">
                    <h2>Shari</h2>
                    <img src="img/ponentes/invitado2.jpg" alt="">
                    <p>Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.</p>
                </div>

            </div>


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado3">
                        <img src="/img/ponentes/invitado3.jpg" alt="Imagen invitado">
                        <p>Juan Sanchez</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="invitado3">
                    <h2>Juan</h2>
                    <img src="img/ponentes/invitado3.jpg" alt="">
                    <p>placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.</p>
                </div>

            </div>


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado4">
                        <img src="/img/ponentes/invitado4.jpg" alt="Imagen invitado">
                        <p>Susana Rivera</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="invitado4">
                    <h2>Susana</h2>
                    <img src="img/ponentes/invitado4.jpg" alt="">
                    <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus</p>
                </div>

            </div>


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado5">
                        <img src="/img/ponentes/invitado5.jpg" alt="Imagen invitado">
                        <p>Harold Garcia</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="invitado5">
                    <h2>Harold</h2>
                    <img src="img/ponentes/invitado5.jpg" alt="">
                    <p>placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.</p>
                </div>

            </div>


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado6">
                        <img src="/img/ponentes/invitado6.jpg" alt="Imagen invitado">
                        <p>Susan Sanchez</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="invitado6">
                    <h2>Susan</h2>
                    <img src="img/ponentes/invitado6.jpg" alt="">
                    <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at
                        ex blandit vehicula. Morbi porttitor tempus euismod.</p>
                </div>

            </div>


        </ul>
        <!-- END lista-invitados -->
    </section>
    <!-- END .invitados -->


    <div class="contador parallax">
        <div class="contenedor">
            <ul class="resumen-evento clearfix">
                <li>
                    <p class="numero">0</p> Invitados
                </li>
                <li>
                    <p class="numero">0</p> Talleres
                </li>
                <li>
                    <p class="numero">0</p> Días
                </li>
                <li>
                    <p class="numero">0</p> Conferencias
                </li>

            </ul>
        </div>
    </div>

 
    <section class="precios seccion">
    <h2>Precios</h2>
    @foreach ($congresos as $congreso)
        <div class="contenedor">
            <ul class="lista-precios clearfix">
                <li>
                    <div class="tabla-precio">
                        <h3>{{$congreso->nombre}}</h3>
                        <p class="numero">S/. {{$congreso->precio}}</p>
                        <ul>
                            <li>Inicio: {{$congreso->fechaInicio}}</li>
                            <li>Fin: {{$congreso->fechaFin}}</li>
                            <!-- <li>Todos los talleres</li> -->
                        </ul>
                        <a href="#" class="button">Comprar</a>
                        <!-- <a href="{{url('/paypal/pay')}}" class="button">Comprar</a> -->
                    </div>
                </li>
            </ul>
        </div>
    @endforeach
    </section>


    <div id="mapa" class="mapa"></div>


    <section class="seccion">
        <h2>Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam blandit neque eu semper ullamcorper. Duis commodo quam in orci condimentum ultricies.
                    <p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--.testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam blandit neque eu semper ullamcorper. Duis commodo quam in orci condimentum ultricies.
                    <p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--.testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam blandit neque eu semper ullamcorper. Duis commodo quam in orci condimentum ultricies.
                    <p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--.testimonial-->
        </div>
    </section>




    <div class="newsletter parallax">
        <div class="contenido contenedor">
            <p> regístrate al newsletter:</p>
            <h3>gdlwebcamp</h3>
            <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a>
        </div>
        <!--.contenido-->
    </div>
    <!--.newsletter-->

    <section class="seccion">
        <h2>Faltan</h2>
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
                <li>
                    <p id="dias" class="numero"></p> días
                </li>
                <li>
                    <p id="horas" class="numero"></p> horas
                </li>
                <li>
                    <p id="minutos" class="numero"></p> minutos
                </li>
                <li>
                    <p id="segundos" class="numero"></p> segundos
                </li>
            </ul>
        </div>
    </section>

    <footer class="site-footer">
        <div class="contenedor clearfix">
            <div class="footer-informacion">
                <h3>Sobre <span>gdlwebcamp</span></h3>
                <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex
                    blandit vehicula. Morbi porttitor tempus euismod.</p>
            </div>
            <div class="ultimos-tweets">
                <h3>Últimos <span>tweets</span></h3>
                <a class="twitter-timeline" data-height="400" data-theme="light" data-link-color="#fe4918" Tweets by </a>
                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class="menu">
                <h3>Redes <span>sociales</span></h3>
                <nav class="redes-sociales">
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </nav>
            </div>
        </div>

        <p class="copyright">
            Todos los derechos Reservados GDLWEBCAMP 2021.
        </p>



        <!-- Begin MailChimp Signup Form -->
        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            #mc_embed_signup {
                background: #fff;
                clear: left;
                font: 14px Helvetica, Arial, sans-serif;
            }

            /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
             We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style>
        <div style="display:none;">
            <div id="mc_embed_signup">
                <form action="//easy-webdev.us11.list-manage.com/subscribe/post?u=b3bb37039b6fbf3db0c1a8331&amp;id=20463b69f2" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                        <h2>Suscribete al Newsletter y no te pierdas nada de este evento</h2>
                        <div class="indicates-required"><span class="asterisk">*</span> es obligatorio</div>
                        <div class="mc-field-group">
                            <label for="mce-EMAIL">Correo Electrónico <span class="asterisk">*</span>
                            </label>
                            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                        </div>
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_b3bb37039b6fbf3db0c1a8331_20463b69f2" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Suscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                    </div>
                </form>
            </div>
            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
            <script type='text/javascript'>
                (function($) {
                    window.fnames = new Array();
                    window.ftypes = new Array();
                    fnames[0] = 'EMAIL';
                    ftypes[0] = 'email';
                    fnames[1] = 'FNAME';
                    ftypes[1] = 'text';
                    fnames[2] = 'LNAME';
                    ftypes[2] = 'text';
                }(jQuery));
                var $mcj = jQuery.noConflict(true);
            </script>
            <!--End mc_embed_signup-->
        </div>
    </footer>



    <script src="{{asset('js/vendor/modernizr-3.8.0.min.js')}}"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        (window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>'))
    </script>


    <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if ($pagina == 'invitados' || $pagina == 'index') {
        echo '<script src="js/jquery.colorbox-min.js"></script>';
    } else if ($pagina == 'conferencia') {
        echo '<script src="js/lightbox.js"></script>';
    }
    ?>


    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('/js/main.js')}}"></script>



    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>