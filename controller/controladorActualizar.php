<?php

include_once('../model/Producto.php');

$objProducto = new Producto();

$result;

if (isset($_POST)) {
    $opcion = $_POST['valor'];


    if ($opcion == 'buscarCodigo') {
        $codigoProducto = $_POST['codigoProducto'];

        $results = $objProducto->ListarProductosCodigo($codigoProducto);
        $busqueda = $codigoProducto;
    }


    if ($opcion == 'buscarNombre') {
        $nombreProducto = $_POST['nombreProducto'];

        $results = $objProducto->ListarProductosNombre($nombreProducto);
        $busqueda = $nombreProducto;
    }


    if ($opcion == 'buscarSucursal') {
        include_once('../model/Sucursal.php');
        $sucursales = Sucursal::ListarSucursales();
        $sucursalProducto = $_POST['sucursalProducto'];

        foreach ($sucursales as $suc) {
            if ($suc['id_sucursal'] == $sucursalProducto) {
                $busqueda = $suc['vch_nombre_suc'];
            }
        }

        $results = $objProducto->ListarProductosSucursal($sucursalProducto);
    }

    if ($opcion == 'actualizar') {
        echo "Producto actualizado";
        $mensaje = Producto::actualizarProducto($_POST['codigo'], $_POST['nombreProducto'], $_POST['precioProducto'], $_POST['descripcionProducto']);
        header("Location: ../view/actualizar.php?Status=" . $mensaje);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Busqueda de Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <!-- Barra de navegacion -->
    <div class="container-fluid bg-dark mb-5">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="../view/main.php" class="nav-link" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="../view/registrar.php" class="nav-link">Registrar</a></li>
                <li class="nav-item"><a href="../view/consultar.php" class="nav-link">Consultar</a></li>
                <li class="nav-item"><a href="../view/actualizar.php" class="nav-link active">Actualizar</a></li>
                <li class="nav-item"><a href="../view/eliminar.php" class="nav-link">Eliminar</a></li>
                <li class="nav-item"><a href="../index.php" class="nav-link text-danger">Salir</a></li>
            </ul>
        </header>
    </div>

    <div class="container w-75 text-center">
        <h1 class="mb-2">Resultado de busqueda de Producto: <?= $busqueda ?></h1><br />

        <!-- Tabla resultados -->
        <table class="table table-striped">
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Descripción</th>
                <th>Sucursal</th>
                <th></th>
            </tr>
            <?php
            foreach ($results as $res) {
                echo '<tr>' .
                    '<td class="my-2">' . $res['vch_codigo_pro'] . '</td>' .
                    '<td class="my-2">' . $res['vch_nombre_pro'] . '</td>' .
                    '<td class="my-2">' . $res['int_precio_pro'] . '</td>' .
                    '<td class="my-2">' . $res['int_cantidad_pro'] . '</td>' .
                    '<td class="my-2">' . $res['vch_descripcion_pro'] . '</td>' .
                    '<td class="my-2">' . $res['vch_nombre_suc'] . '</td>' .
                    '<td class="my-2">' . '<form action="../view/confirmacionActualizacion.php" method="POST">
                    <input type="text" name="codigo" value="' . $res['vch_codigo_pro'] . '" hidden />
                    <input type="text" name="nombre" value="' . $res['vch_nombre_pro'] . '" hidden />
                    <input type="text" name="precio" value="' . $res['int_precio_pro'] . '" hidden />
                    <input type="text" name="cantidad" value="' . $res['int_cantidad_pro'] . '" hidden />
                    <input type="text" name="descripcion" value="' . $res['vch_descripcion_pro'] . '" hidden />
                    <input type="text" name="id" value="' . $res['id_producto'] . '" hidden />
                    <input type="text" name="sucursalProducto" value="' . $res['sucursal_id_sucursal'] . '" hidden />
                    <input type="text" name="categoriaProducto" value="' . $res['categoria_id_categoria'] . '" hidden />

            
                    <button type="submit"><svg width="25" height="25" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <g fill="#10b981">
                        <path d="M5.05 14.95a1 1 0 1 1 1.414-1.414A5 5 0 0 0 15 10a1 1 0 1 1 2 0a7 7 0 0 1-11.95 4.95Z"/>
                        <path d="M13.559 12.832a1 1 0 1 1-1.11-1.664l3-2a1 1 0 1 1 1.11 1.664l-3 2Z"/>
                        <path d="M18.832 12.445a1 1 0 0 1-1.664 1.11l-2-3a1 1 0 1 1 1.664-1.11l2 3Zm-3.975-7.594a1 1 0 1 1-1.414 1.414a5 5 0 0 0-8.536 3.536a1 1 0 1 1-2 0a7 7 0 0 1 11.95-4.95Z"/>
                        <path d="M6.349 6.969a1 1 0 0 1 1.11 1.664l-3.001 2a1 1 0 1 1-1.11-1.664l3-2Z"/>
                        <path d="M1.075 7.356a1 1 0 1 1 1.664-1.11l2 3a1 1 0 1 1-1.664 1.11l-2-3Z"/>
                    </g>
                </svg>
                    </button>
                </form>' . '</td>' .
                    '</tr>';
            }
            ?>
        </table>
    </div>



    <script src="../js/validacionConsultaProducto.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>