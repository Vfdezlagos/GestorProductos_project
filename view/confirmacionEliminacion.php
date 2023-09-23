<?php
include_once('../model/Categoria.php');
include_once('../model/Sucursal.php');
$categorias = Categoria::ListarCategorias();
$sucursales = Sucursal::ListarSucursales();

extract($_POST);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
                <li class="nav-item"><a href="./actualizar.php" class="nav-link">Actualizar</a></li>
                <li class="nav-item"><a href="./eliminar.php" class="nav-link active">Eliminar</a></li>
                <li class="nav-item"><a href="../index.php" class="nav-link text-danger">Salir</a></li>
            </ul>
        </header>
    </div>

    <div class="container-fluid text-center">
        <h1>Confirmar Eliminación del producto.</h1>

        <form class="formulario" action="../controller/controladorEliminar.php" method="POST"
            id="formularioRegistroProducto">
            <!-- codigo producto, nombre, categoria, sucursal, descripcion, cantidad y precio -->
            <label class="mt-4" for="codigoProducto">Codigo: </label>
            <input class="input w-25" type="text" name="codigoProducto" id="inputCodigoProducto" value="<?= $codigo ?>"
                disabled />

            <br /><br />

            <label class="mt-4" for="nombreProducto">Nombre: </label>
            <input class="input w-25" type="text" name="nombreProducto" id="inputNombreProducto" value="<?= $nombre ?>"
                disabled />

            <br /><br /><br />

            <label class="mt-4" for="categoriaProducto">Categoria: </label>
            <select disabled class="border-dark rounded-4 form-select w-25" name="categoriaProducto"
                id="inputCategoriaProducto">
                <option value="#">Seleccione una Categoria</option>
                <?php
                foreach ($categorias as $categoria) {
                    if ($categoria['id_categoria'] == $categoriaProducto) {
                        echo '<option selected value="' . $categoria['id_categoria'] . '">' . $categoria['vch_nombre_cat'] . '</option>';
                    } else {
                        echo '<option value="' . $categoria['id_categoria'] . '">' . $categoria['vch_nombre_cat'] . '</option>';
                    }
                }
                ?>
            </select>

            <br /><br /><br />

            <label class="mt-4" for="sucursalProducto">Sucursal: </label>
            <select disabled class="border-dark rounded-4 form-select w-25" name="sucursalProducto"
                id="inputSucursalProducto">
                <option value="#">Seleccione una Sucursal</option>
                <?php
                foreach ($sucursales as $sucursal) {
                    if ($sucursal['id_sucursal'] == $sucursalProducto) {
                        echo '<option selected value="' . $sucursal['id_sucursal'] . '">' . $sucursal['vch_nombre_suc'] . '</option>';
                    } else {
                        echo '<option value="' . $sucursal['id_sucursal'] . '">' . $sucursal['vch_nombre_suc'] . '</option>';
                    }
                }
                ?>
            </select>

            <br /><br />

            <label class="mt-4" for="cantidadProducto">Cantidad: </label>
            <input class="input w-25" type="number" name="cantidadProducto" id="inputCantidadProducto"
                value="<?= $cantidad ?>" disabled />

            <br /><br />

            <label class="mt-4" for="precioProducto">Precio: </label>
            <input class="input w-25" type="number" name="precioProducto" id="inputPrecioProducto"
                value="<?= $precio ?>" disabled />

            <br /><br />

            <label class="mt-4" for="descripcionProducto">Descripcion: </label><br />
            <textarea class="descripcion" name="descripcionProducto" id="inputDescripcionProducto" cols="60" rows="6"
                disabled><?= $descripcion ?></textarea>

            <br /><br />

            <input type="text" name="idProducto" value="<?= $id ?>" hidden />
            <input type="text" name="codigo" value="<?= $codigo ?>" hidden />

            <button class="btn btn-danger my-3" type="submit" name="valor" value="eliminar"
                id="btn_registro_producto">Eliminar</button>
        </form>
    </div>


    <!-- <script src="../js/validacionRegistroProducto.js" type="text/javascript"></script> -->
    <script src="../js/validacionRegistroProducto.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>