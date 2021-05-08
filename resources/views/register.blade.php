<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login/styles.css" type="text/css" >
    <link rel="stylesheet" href="css/normalize.css" type="text/css" >
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link rel="icon" href="images/icono.png" type="image/png" />
    <script src="js/sweetalert2.js"></script>

    <title>Registro</title>
  </head>
<body>

    <h1>Registro</h1>

    <div class = "flex justify-center" >
        <div class = "w-4/12 bg-white p-6 rounded-lg" >
            <form action="{{ route('register') }}">
                @csrf

                <div class = "mb-4">
                    <label for = "nombres" class = "sr-only">Nombres</label>
                    <input type = "text" name = "nombres" id = "nombres" placeholder = "Su nombre">

                    @error('Nombre')
                        <div>
                            {{$message}}
                        </div>
                    @enderror
                </div>


                <!--class = "bg-orange-100 border-2 w-full p-4 rounded-lg" value=""-->
                <br>

                <div class = "mb-4">
                    <label for = "apellidoPaterno" class = "sr-only">Apellido Paterno</label>
                    <input type = "text" name = "apellidoPaterno" id = "apellidoPaterno" placeholder = "Su apellido paterno">
                </div>
                <br>
                
                <div class = "mb-4">
                    <label for = "apellidoMaterno" class = "sr-only">Apellido Materno</label>
                    <input type = "text" name = "apellidoMaterno" id = "apellidoMaterno" placeholder = "Su apellido materno">
                </div>
                <br>
                
                <div class = "mb-4">
                    <label for = "email" class = "sr-only">Email</label>
                    <input type = "text" name = "email" id = "email" placeholder = "Su Email">
                </div>
                <br>
                
                <div class = "mb-4">
                    <label for = "password" class = "sr-only">Password</label>
                    <input type = "password" name = "password" id = "password" placeholder = "Su password">
                </div>
                <br>
                
                <div class = "mb-4">
                    <label for = "confirmarPassword" class = "sr-only">Confirmar Password</label>
                    <input type = "password" name = "confirmarPassword" id = "confirmarPassword" placeholder = "Confirme su password">
                </div>
                <br>

                <div>
                    <button type = "submit">Registrarme</button>


                </div>
            </form>
        </div>
    </div>
</body>
</html>