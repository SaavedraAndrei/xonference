<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />

  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Icono -->
  <link rel="icon" href="{{asset('/icon.png')}}" type="image/png" />
  <!-- <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png"> -->

  <!-- Para Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

  <!-- <link rel="stylesheet" href="/build/css/app.css"> -->
  <script src="https://kit.fontawesome.com/1a2bd5a108.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

  <!-- Estilos propios -->
  <link href="{{ mix('/css/styleVistas.css') }}" rel="stylesheet" />

  <!-- Sweet Alert -->
  <script src="{{asset('js/sweetalert2.js') }}"></script>

  <!-- Laravel Mixin -->
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
  <script src="{{ mix('/js/app.js') }}" defer></script>

  <meta name="theme-color" content="#fafafa">
</head>

<body>

  <!-- <header class="site-header">
    <div class="hero">

      <div class="contenido-header contenedor">

        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest-p"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>

        <div class="informacion-evento">
          <p> <i class="fas fa-calendar-alt"> </i> 20 - 22 Marzo </p>
          <p> <i class="fas fa-map-marker-alt"></i> Lima, Perú</p>
        </div>
        <h1 class="nombre-sitio">APP CONGRESO</h1>
        <p class="slogan" style="margin-top:15%">
          Los mejores<span> congresos</span></p>
      </div>
    </div>
  </header> -->
  @inertia
  <footer class="footer">
    <div class="contenedor-footer contenedor">
      <div class="texto-footer">
        <h3>Sobre <span>GDLWEBCAMP</span></h3>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. In, omnis, unde earum doloribus perspiciatis quis laboriosam, eius nemo commodi incidunt laborum quae molestiae debitis tempore odit neque expedita obcaecati repellendus.
        </p>
      </div>
      <div class="texto-footer">
        <h3>Últimos <span>Tweets</span></h3>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. In, omnis, unde earum doloribus perspiciatis quis laboriosam, eius nemo commodi incidunt laborum quae molestiae debitis tempore odit neque expedita obcaecati repellendus.
        </p>
      </div>
      <div class="texto-footer">
        <h3>Redes <span>Sociales</span></h3>
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest-p"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>
      </div>
    </div>
  </footer>
  <div class="copyright">
    <p>Todos los derechos reservados GDLWEBCAMP 2021 &copy;</p>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="/vendor/jquery-3.4.1.min.js"><\/script>')
  </script>
  <script src="/js/bundle.min.js"></script>

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
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>