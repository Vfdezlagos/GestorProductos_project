<!-- Actividad Calificada 1: -->
<!-- Integrantes: Francisca Sanhueza, Javier Sepulveda y Vicente Fernández -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <div class="container-fluid text-center">
        <h1 class="fw-bold ">Login usuario.</h1>
        <h2 class="text-decoration-underline">Bienvenido/a</h2>
        <form class="formulario row g-3 my-5 " action="./controller/controladorIndex.php" method="POST"
            id="formularioLogin">

            <div class="col-auto">
                <label for="nombreUsuario">Usuario: </label>
                <input class="input" type="text" name="nombreUsuario" id="inputUsuario" placeholder="admin" />
            </div>

            <div class="col-auto">
                <label for="passwordUsuario">Contraseña: </label>
                <input class="input" type="password" name="passwordUsuario" id="inputPassword" placeholder="1234" />
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-outline-primary mb-3">Ingresar</button>
            </div>
        </form>

        <?php
        if (isset($_GET['Error'])) {
            echo '<h3 class="text-danger">Usuario y/o contraseña incorrectos.</h3>';
        }
        ?>
    </div>

    <!-- <script src="./js/validacionLogin.js" type="text/javascript"></script> -->
    <script src="./js/validacionLogin.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>