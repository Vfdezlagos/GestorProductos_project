<?php
include_once('../model/Sucursal.php');
$sucursales = Sucursal::ListarSucursales();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de productos</title>
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
                <li class="nav-item"><a href="./consultar.php" class="nav-link active">Consultar</a></li>
                <li class="nav-item"><a href="./actualizar.php" class="nav-link">Actualizar</a></li>
                <li class="nav-item"><a href="./eliminar.php" class="nav-link">Eliminar</a></li>
                <li class="nav-item"><a href="../index.php" class="nav-link text-danger">Salir</a></li>
            </ul>
        </header>
    </div>

    <div class="text-center container">
        <h1>Consulta de productos</h1>

        <h2 class="mt-5 mb-3">Buscar por codigo</h2>
        <form class="formulario" action="../controller/controladorConsultar.php" method="POST" id="formularioConsultaCodigo">
            <label for="codigoProducto">Codigo del producto: </label>
            <input class="input w-25" type="text" name="codigoProducto" id="inputCodigoProducto" />
            <br /><br />
            <button class="btn btn-primary my-3" type="submit" name="valor" value="buscarCodigo">Buscar</button>
        </form>

        <br /><br />

        <h2>Buscar por nombre</h2>
        <form class="formulario" action="../controller/controladorConsultar.php" method="POST" id="formularioConsultaNombre">
            <!-- codigo, nombre y sucursal -->
            <label for="nombreProducto">Nombre del producto: </label>
            <input class="input w-25" type="text" name="nombreProducto" id="inputNombreProducto" />
            <br /><br />
            <button class="btn btn-primary my-3" type="submit" name="valor" value="buscarNombre">Buscar</button>
        </form>

        <br /><br />

        <h2>Buscar por sucursal</h2>
        <form class="formulario" action="../controller/controladorConsultar.php" method="POST" id="formularioConsultaSucursal">
            <!-- codigo, nombre y sucursal -->
            <label class="mt-4" for="sucursalProducto">Sucursal: </label>
            <select class="border-dark rounded-4 form-select w-25" name="sucursalProducto" id="inputSucursalProducto">
                <option selected value="#">Seleccione una Sucursal</option>
                <?php
                foreach ($sucursales as $sucursal) {
                    echo '<option value="' . $sucursal['id_sucursal'] . '">' . $sucursal['vch_nombre_suc'] . '</option>';
                }
                ?>
            </select>
            <br /><br />
            <button class="btn btn-primary my-3" type="submit" name="valor" value="buscarSucursal">Buscar</button>
        </form>
    </div>


    <!-- <script src="../js/validacionConsultaProducto.js" type="text/javascript"></script> -->
    <script src="../js/validacionConsultaProducto.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>