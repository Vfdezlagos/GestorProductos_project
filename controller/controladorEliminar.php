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

    if ($opcion == 'eliminar') {
        $mensaje = Producto::eliminarProducto($_POST['idProducto'], $_POST['codigo']);
        header("Location: ../view/eliminar.php?Status=" . $mensaje);
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
                <li class="nav-item"><a href="../view/actualizar.php" class="nav-link">Actualizar</a></li>
                <li class="nav-item"><a href="../view/eliminar.php" class="nav-link active">Eliminar</a></li>
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
                    '<td class="my-2">' . '<form action="../view/confirmacionEliminacion.php" method="POST">
                    <input type="text" name="codigo" value="' . $res['vch_codigo_pro'] . '" hidden />
                    <input type="text" name="nombre" value="' . $res['vch_nombre_pro'] . '" hidden />
                    <input type="text" name="precio" value="' . $res['int_precio_pro'] . '" hidden />
                    <input type="text" name="cantidad" value="' . $res['int_cantidad_pro'] . '" hidden />
                    <input type="text" name="descripcion" value="' . $res['vch_descripcion_pro'] . '" hidden />
                    <input type="text" name="id" value="' . $res['id_producto'] . '" hidden />
                    <input type="text" name="sucursalProducto" value="' . $res['sucursal_id_sucursal'] . '" hidden />
                    <input type="text" name="categoriaProducto" value="' . $res['categoria_id_categoria'] . '" hidden />

            
                    <button type="submit"><svg width="25" height="25" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <g fill="#ef4444">
                        <path d="M11.937 4.5H8.062A2.003 2.003 0 0 1 10 2a2.003 2.003 0 0 1 1.937 2.5Z"/>
                        <path d="M4.5 5.5a1 1 0 0 1 0-2h11a1 1 0 1 1 0 2h-11Z"/>
                        <path fill-rule="evenodd" d="M14.5 18.5a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-9a1 1 0 0 0-1 1v10.5a1 1 0 0 0 1 1h9Zm-2-10a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7ZM10 8a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 1 0v-7A.5.5 0 0 0 10 8Zm-3.5.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7Z" clip-rule="evenodd"/>
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