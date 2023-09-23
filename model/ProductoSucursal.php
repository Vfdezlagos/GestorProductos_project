<?php
include_once('Connection.php');

class ProductoSucursal
{

    public static function insertarProductoEnSucursal($producto_id, $sucursal_id)
    {
        $stringConnection = Connection::conectar();

        $query = "INSERT INTO sucursal_has_productos VALUES($producto_id, $sucursal_id);";

        if (mysqli_query($stringConnection, $query)) {
            $rows = mysqli_affected_rows($stringConnection);

            if ($rows > 0) {
                $message = "Producto registrado correctamente en la sucursal $sucursal_id.";
            } else {
                $message = 'Error al registrar el producto en la sucursal.';
            }
        } else {
            $message = 'Error de conexion con la base de datos.';
        }

        return $message;
    }
}
