<?php
include_once('../model/Categoria.php');
include_once('../model/Sucursal.php');
$categorias = Categoria::ListarCategorias();
$sucursales = Sucursal::ListarSucursales();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <!-- Barra de navegacion -->
    <div class="container-fluid bg-dark mb-5">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="./main.php" class="nav-link" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="./registrar.php" class="nav-link active">Registrar</a></li>
                <li class="nav-item"><a href="./consultar.php" class="nav-link">Consultar</a></li>
                <li class="nav-item"><a href="./actualizar.php" class="nav-link">Actualizar</a></li>
                <li class="nav-item"><a href="./eliminar.php" class="nav-link">Eliminar</a></li>
                <li class="nav-item"><a href="../index.php" class="nav-link text-danger">Salir</a></li>
            </ul>
        </header>
    </div>

    <div class="container-fluid text-center">
        <h1>Registro de productos</h1>

        <form class="formulario" action="../controller/controladorRegistrar.php" method="POST" id="formularioRegistroProducto">
            <!-- codigo producto, nombre, categoria, sucursal, descripcion, cantidad y precio -->
            <label class="mt-4" for="codigoProducto">Codigo: </label>
            <input class="input w-25" type="text" name="codigoProducto" id="inputCodigoProducto" />

            <br /><br />

            <label class="mt-4" for="nombreProducto">Nombre: </label>
            <input class="input w-25" type="text" name="nombreProducto" id="inputNombreProducto" />

            <br /><br /><br />

            <label class="mt-4" for="categoriaProducto">Categoria: </label>
            <select class="border-dark rounded-4 form-select w-25" name="categoriaProducto" id="inputCategoriaProducto">
                <option selected value="#">Seleccione una Categoria</option>
                <?php
                foreach ($categorias as $categoria) {
                    echo '<option value="' . $categoria['id_categoria'] . '">' . $categoria['vch_nombre_cat'] . '</option>';
                }
                ?>
            </select>

            <br /><br /><br />

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

            <label class="mt-4" for="cantidadProducto">Cantidad: </label>
            <input class="input w-25" type="number" name="cantidadProducto" id="inputCantidadProducto" />

            <br /><br />

            <label class="mt-4" for="precioProducto">Precio: </label>
            <input class="input w-25" type="number" name="precioProducto" id="inputPrecioProducto" />

            <br /><br />

            <label class="mt-4" for="descripcionProducto">Descripcion: </label><br />
            <textarea class="descripcion" name="descripcionProducto" id="inputDescripcionProducto" cols="60" rows="6"></textarea>

            <br /><br />

            <button class="btn btn-primary my-3" type="submit" id="btn_registro_producto">Registrar</button>
        </form>
    </div>


    <!-- <script src="../js/validacionRegistroProducto.js" type="text/javascript"></script> -->
    <script src="../js/validacionRegistroProducto.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>