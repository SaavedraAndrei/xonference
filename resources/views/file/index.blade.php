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
    <link rel="stylesheet" href="css/recursos/styles_listarecursos.css" type="text/css">
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <meta name="description" content="">


    <link rel="icon" href="{{asset('/icon.png')}}" type="image/png" />
    <script src="js/sweetalert2.js"></script>

    <title>Recursos</title>
    @routes
</head>
<body>
    
  <div class="navbar-header">
        <a class="navbar-brand" href="./"style="margin-right: 0px;"><img src="img/logo.svg" alt="Logo" id="logoPrincipal"></a>
    </div>

<div class="container">
  <div class="row it" id="contenedor_blanco">
    <div class="col-sm-offset-1 col-sm-10" id="one" style="overflow-x:auto;">
      <p>RECURSOS</p>
      <div class="row">
        <div class="col-sm-offset-4 col-sm-4 form-group">
          <!-- <h3 class="text-center">My Documents</h3> -->
        </div>
        <!--form-group-->
      </div>
      
      <div>
        @if(session('success'))
            <div class="alert alert-success">
                <strong>{{session('success')}}</strong>
            </div>
        @endif

        <div>
            
            <div>
              <div style="overflow-x:auto;">
                <table>
                <thead>
                  <th width="800">Archivo</th>
                  <th>Enlace</th>
                </thead>
                @foreach ($files as $file)
                <tr>
                <td>{{ $file->title }}</td>
                <td id="colum2"><a href="{{ route('downloadfile', $file->id) }}" class="btn btn-orange">Descargar</a></td>
                </tr>
                <!-- <br> -->

                @endforeach
                </table>
              </div>
            </div>
            
        </div>
    </div>
      
      <!-- <div class="text-center">
        <a class="btn btn-new" href="{{ route('formfile')}}"><i class="fa fa-plus"></i> Subir</a>
      </div> -->
    </div>
    
  </div>
</div>


</body>
</html>
