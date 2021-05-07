<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="/css/fonts.css" type="text/css">
    <link rel="stylesheet" href="/css/home/styles.css" type="text/css">
    <link rel="icon" href="/images/icono.png" type="image/png" />

    <title>Home</title>
    <script src="{{asset('js/sweetalert2.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
</head>

<body>
    <?php

    if (!empty($mensaje)) {
    ?>
        <script>
            //console.log('<?= $mensaje; ?>');
            if ('<?= $mensaje; ?>' == "ACEPTADO") {
                Swal.fire({
                    icon: 'success',
                    title: 'Bienvenido',
                    text: '{{session("nombres")}}',
                    customClass: {
                        title: 'title-swal',
                        text: 'text-swal'
                    }
                })
            } else if ('<?= $mensaje; ?>' == "RECHAZADO") {
                Swal.fire({
                    icon: 'error',
                    title: '¡Ups!',
                    text: 'Usted no está autorizado a este módulo',
                    confirmButtonText: 'Aceptar',
                })
            }
        </script>
    <?php
    }
    ?>


    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="/home"><img class="logo-principal" src="img/logo.svg" alt="Logo"></a>
            </div>
        </div>

        <div class="btn-group menu-button" role="group">
            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item submenu-button" href="/general">GENERAL</a>
            </div>
        </div>
    </header>

    <div class="content" id='content_Principal' style='display:block'>
        <div class="btn-group">
            <a class="btn" href="#">
                <div class="boton color-creditos" id="btnCreditos">MENU</div>
                <span class="caret"></span>
            </a>
        </div>
        <div class="btn-group">
            <a class="btn " href="#">
                <div class="boton color-operaciones" id="btnOperaciones">MATERIALES</div>
                <span class="caret"></span>
            </a>
        </div>
        <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" id="contenedor_gth" onClick="mostrarSubItem('btnGth','submenuGth')">
                <div class="boton color-gth" id="btnGth">algo x</div>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" id="submenuGth">
                <div class="sub_boton color-gth" id="btnAsistencia"><a class="sub_text" href="#" color="white">USUARIOS Y ASISTENCIA</a></div>
                <div class="sub_boton color-gth" id="btnColaborador"><a class="sub_text" href="#">COLABORADOR DEL MES</a></div>
                <div class="sub_boton color-gth" id="btnPlanillas"><a class="sub_text" href="#">PLANILLAS</a></div>
                <div class="sub_boton color-gth" id="btnMiPanel"><a class="sub_text" href="#">MI PANEL</a></div>
            </ul>
        </div>
        <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" onClick="mostrarSubItem('btnLogistica','submenuLogistica')">
                <div class="boton color-logistica" id="btnLogistica">algo x</div>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" id="submenuLogistica">
                <div class="sub_boton color-logistica"><a class="sub_text" href="#">GESTIÓN DE ACTIVOS</a></div>
                <div class="sub_boton color-logistica"><a class="sub_text" href="#">GESTIÓN DE SUMINISTROS</a></div>
                <!-- <div class="sub_boton color-logistica"><a class="sub_text" href="#"></a></div> -->
                <div class="sub_boton color-logistica"><a class="sub_text" href="#">MI PANEL</a></div>
            </ul>
        </div>
        <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" onClick="mostrarSubItem('btnContabilidad','submenuContabilidad')">
                <div class="boton color-contabilidad" id="btnContabilidad">algo x</div>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" id="submenuContabilidad">
                <div class="sub_boton color-contabilidad"><a class="sub_text" href="#"></a></div>
                <div class="sub_boton color-contabilidad"><a class="sub_text" href="#"></a></div>
                <div class="sub_boton color-contabilidad"><a class="sub_text" href="#"></a></div>
                <div class="sub_boton color-contabilidad"><a class="sub_text" href="#"></a></div>
            </ul>
        </div>
    </div>

    <span class="version">1.0


        <span>

            <button class="btn btn-primary btn-close" onclick="cerrarSesion()">
                <i class="fas fa-power-off"></i>
            </button>


            <script type="text/javascript">
                function cerrarSesion() {
                    Swal.fire({
                        title: 'CERRAR SESIÓN',
                        text: "Su sesión será cerrada. ¿Desea continuar?",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar',
                        position: 'bottom-end',
                        customClass: {
                            title: 'title-swal',
                            text: 'text-swal'
                        }
                    }).then((result) => {

                        if (result.value == true) {
                            let timerInterval
                            Swal.fire({
                                title: 'Cerrando sesión!',
                                html: 'Su sesión se esta cerrando en  <b></b> milisegundos',
                                timer: 500,
                                timerProgressBar: true,
                                onBeforeOpen: () => {
                                    Swal.showLoading()
                                    timerInterval = setInterval(() => {
                                        const content = Swal.getContent()
                                        if (content) {
                                            const b = content.querySelector('b')
                                            if (b) {
                                                b.textContent = Swal.getTimerLeft()
                                            }
                                        }
                                    }, 100)
                                },
                                onClose: () => {
                                    clearInterval(timerInterval)
                                }
                            }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    location.replace("/")
                                }
                            })

                        }

                    })

                }
            </script>

            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

            <script type="text/javascript" src="/js/home/scripts.js"></script>
</body>

</html>