<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="" type="text/css"> -->
    <link rel="stylesheet" href="{{asset('css/recursos/styles_subirrecursos.css')}}" />
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <meta name="description" content="">


    <link rel="icon" href="{{asset('/icon.png')}}" type="image/png" />
    <script src="js/sweetalert2.js"></script>

    <title>Recursos - Subir</title>
    @routes
</head>
<body>

    <div class="navbar-header">
        <a class="navbar-brand" href="/" style="margin-right: 0px;"><img src="/img/logo.svg" alt="Logo" id="logoPrincipal"></a>
    </div>

    <div class="container">
    <div class="row it" id="contenedor_blanco">
        <div class="col-sm-offset-1 col-sm-10" id="one" style="overflow-x:auto;">
        <p>
            Elija Recurso
        </p>
    
        <!--row-->
        <div id="uploader">
            <div class="row uploadDoc">
                <div class="col-sm-11" style="padding-left: 0px;">
                    <!-- <div class="docErr">Please upload valid file</div> -->
                    <!--error-->
                    <div class="fileUpload btn btn-orange">

                    <form action="{{ route('uploadfile') }}" method ="post" enctype="multipart/form-data">
                    @csrf

                        <div>
                        <input type="file" name ="file" class="inputstyle"><br>
                        </div>
                        <button type="file" class="btn btn-new"><i class="fa fa-plus"></i> Enviar Recurso </button>
                    </form>

                
                </div><!-- btn-orange -->
            </div><!-- col-3 -->            
        </div>
        <!--uploader-->
        <div class="text-center">
            <a href="{{ route('viewfile') }}" class="btn btn-next"><i class="fa fa-paper-plane"></i>Volver</a>
            <a href="{{ route('home') }}" class="btn btn-next"><i class="fa fa-paper-plane"></i>Ir al Menu</a>
        </div>
        </div>
        <!--one-->
    </div><!-- row -->
    </div><!-- container -->



    
</body>
</html>
