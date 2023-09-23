<?php

extract($_POST);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <!-- Barra de navegacion -->
    <div class="container-fluid bg-dark mb-5">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="./main.php" class="nav-link" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="./registrar.php" class="nav-link">Registrar</a></li>
                <li class="nav-item"><a href="./consultar.php" class="nav-link">Consultar</a></li>
                <li class="nav-item"><a href="./actualizar.php" class="nav-link active">Actualizar</a></li>
                <li class="nav-item"><a href="./eliminar.php" class="nav-link">Eliminar</a></li>
                <li class="nav-item"><a href="../index.php" class="nav-link text-danger">Salir</a></li>
            </ul>
        </header>
    </div>

    <div class="container-fluid text-center">
        <h1>Actualizacion de productos</h1>

        <form class="formulario" action="../controller/controladorActualizar.php" method="POST" id="formularioActualizacionProducto">

            <label class="mt-4" for="codigoProducto">Codigo: </label>
            <input class="input" type="text" name="codigoProducto" id="inputCodigoProducto" value="<?= $codigo ?>" disabled />

            <br /><br />

            <label class="mt-4" for="nombreProducto">Nombre del producto: </label>
            <input class="input" type="text" name="nombreProducto" id="inputNombreProducto" value="<?= $nombre ?>" />

            <br /><br />

            <label class=" mt-4" for="precioProducto">Precio: </label>
            <input class="input" type="number" name="precioProducto" id="inputPrecioProducto" value="<?= $precio ?>" />

            <br /><br />

            <label class=" mt-4" for="descripcionProducto">Descripcion: </label><br />
            <textarea class="descripcion" name="descripcionProducto" id="inputDescripcionProducto" cols="60" rows="6"><?= $descripcion ?></textarea>

            <br /><br />

            <input type="text" name="codigo" value="<?= $codigo ?>" hidden />

            <button class="btn btn-warning my-3" type="submit" name="valor" value="actualizar" id="btn_registro_producto">Actualizar</button>
        </form>
    </div>

    <!-- <script src="../js/validacionActualizacionProducto.js" type="text/javascript"></script> -->
    <script src="../js/validacionActualizacionProducto.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>