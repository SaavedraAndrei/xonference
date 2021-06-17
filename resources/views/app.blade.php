<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />

  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Icono -->
  <link rel="icon" href="{{asset('/icon.png')}}" type="image/png" />

  <!-- Para Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

  <!-- Estilos DataTables -->
  <link rel="stylesheet" href="{{asset('datatables/dataTables.bootstrap4.min.css')}}">
  <script src="https://kit.fontawesome.com/1a2bd5a108.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

  <!-- Estilosrel="stylesheet"  propios -->
  <link rel="stylesheet" href="{{ mix('/css/styleVistas.css') }}" />
  <link rel="stylesheet" href="{{asset('css/normalize.css')}}" />
  <link rel="stylesheet" href="{{asset('css/fonts.css') }}">

  <!-- Sweet Alert -->
  <script src="{{asset('js/sweetalert2.js') }}"></script>

  <!-- Laravel Mixin -->
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
  <script src="{{ mix('/js/app.js') }}" defer></script>

  <!-- API JITSI -->
  <script src='https://8x8.vc/libs/external_api.min.js'></script>


  <meta name="theme-color" content="#fafafa">
  @routes
</head>

<body id="page-top">


  @inertia

  <!-- Jquery-->
  <script type="text/javascript" src="{{asset('js/jquery.js') }}"></script>
  <!-- Fechas-->
  <script src="{{asset('js/moment.min.js')}}"></script>
  <!-- Scripts para Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <!-- Scripts para DataTables-->
  <script src="{{asset('datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{asset('datatables/JSZip-2.5.0/jszip.min.js') }}"></script>
  <script src="{{asset('datatables/dataTables.fixedColumns.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('datatables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('datatables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
  <script type="text/javascript" src="{{asset('datatables/Buttons-1.6.5/js/dataTables.buttons.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('datatables/Buttons-1.6.5/js/buttons.bootstrap4.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('datatables/Buttons-1.6.5/js/buttons.html5.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('datatables/Buttons-1.6.5/js/buttons.print.min.js') }}"></script>


  <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
  <script>
    window.jQuery || document.write('<script src="/vendor/jquery-3.4.1.min.js"><\/script>')
  </script>
  <!-- <script src="/js/bundle.min.js"></script> -->

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