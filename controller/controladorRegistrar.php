<h1>controlador Registrar producto</h1>

<?php
include('../model/Producto.php');
include('../model/ProductoSucursal.php');

if (isset($_POST)) {
    extract($_POST);


    /* CONVERTIR A INTEGER */

    $cantidad = (int) $cantidadProducto;
    $precio = (int) $precioProducto;
    $categoria = (int) $categoriaProducto;
    $sucursal = (int) $sucursalProducto;


    /* INSERTAR NUEVO PRODUCTO */

    $objProducto = new Producto();
    $message1 = $objProducto->insertarProducto($codigoProducto, $nombreProducto, $descripcionProducto, $cantidad, $precio, $categoria);

    echo '<br/><h2>' . $message1 . '</h2>';



    /* Registrar producto en sucursal (tabla sucursal_has_producto) */

    $ultimoId = $objProducto->ListarUltimoId();

    $arrayProducto = mysqli_fetch_array($ultimoId);

    $id_producto = (int) $arrayProducto[0];

    $objProductoSucursal = new ProductoSucursal();

    $message2 = $objProductoSucursal->insertarProductoEnSucursal($id_producto, $sucursal);

    echo '<br/><h2>' . $message2 . '</h2>';

    header("Refresh: 3 ; URL=../view/registrar.php");
}
?>