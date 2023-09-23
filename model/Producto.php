<?php
include_once('Connection.php');

class Producto
{

    //funcion para insertar registros de productos en DB mydb de mysql.

    public static function insertarProducto($codigo, $nombre, $descripcion, $cantidad, $precio, $categoria)
    {
        $stringConnection = Connection::conectar();
        $query = "INSERT INTO producto VALUES(null, '$codigo', '$nombre', '$descripcion', $cantidad, $precio, $categoria);";

        if (mysqli_query($stringConnection, $query)) {
            $rows = mysqli_affected_rows($stringConnection);

            if ($rows > 0) {
                $message = "Producto registrado correctamente.";
            } else {
                $message = 'Error al registrar el producto.';
            }
        } else {
            $message = 'Error de conexion con la base de datos.';
        }

        return $message;
    }



    //funcion para Listar o buscar registros de productos en DB mydb de mysql.
    public static function ListarUltimoId()
    {
        $stringConnection = Connection::conectar();
        $query = "SELECT MAX(id_producto) AS id FROM producto;";

        $result = mysqli_query($stringConnection, $query);
        mysqli_close($stringConnection);

        return $result;
    }

    public static function ListarProductosCodigo($codigo)
    {
        $stringConnection = Connection::conectar();

        $query = "SELECT p.id_producto, p.vch_nombre_pro, p.int_precio_pro, p.int_cantidad_pro, p.vch_descripcion_pro, p.vch_codigo_pro, p.categoria_id_categoria, s.vch_nombre_suc, sp.sucursal_id_sucursal FROM producto p 
        LEFT JOIN sucursal_has_productos sp 
        ON p.id_producto = sp.producto_id_producto
        LEFT JOIN sucursal s 
        ON sp.sucursal_id_sucursal = s.id_sucursal
        WHERE vch_codigo_pro LIKE '%$codigo%'";

        $result = mysqli_query($stringConnection, $query);
        mysqli_close($stringConnection);

        return $result;
    }


    public static function ListarProductosNombre($nombre)
    {
        $stringConnection = Connection::conectar();
        $query = "SELECT p.id_producto, p.vch_nombre_pro, p.int_precio_pro, p.int_cantidad_pro, p.vch_descripcion_pro, p.vch_codigo_pro, p.categoria_id_categoria, s.vch_nombre_suc, sp.sucursal_id_sucursal FROM producto p 
        LEFT JOIN sucursal_has_productos sp 
        ON p.id_producto = sp.producto_id_producto
        LEFT JOIN sucursal s 
        ON sp.sucursal_id_sucursal = s.id_sucursal
        WHERE vch_nombre_pro LIKE '%$nombre%'";

        $result = mysqli_query($stringConnection, $query);
        mysqli_close($stringConnection);

        return $result;
    }


    public static function ListarProductosSucursal($sucursal)
    {
        $stringConnection = Connection::conectar();
        $query = "SELECT p.id_producto, p.vch_nombre_pro, p.int_precio_pro, p.int_cantidad_pro, p.vch_descripcion_pro, p.vch_codigo_pro, p.categoria_id_categoria, s.vch_nombre_suc, sp.sucursal_id_sucursal FROM producto p 
            LEFT JOIN sucursal_has_productos sp 
            ON p.id_producto = sp.producto_id_producto
            LEFT JOIN sucursal s 
            ON sp.sucursal_id_sucursal = s.id_sucursal
            WHERE sp.sucursal_id_sucursal = $sucursal;";

        $result = mysqli_query($stringConnection, $query);
        mysqli_close($stringConnection);

        return $result;
    }

    public static function eliminarProductoId($producto_id)
    {
        $stringConnection = Connection::conectar();
        $query = "DELETE FROM producto WHERE id_producto = $producto_id;";

        if (mysqli_query($stringConnection, $query)) {
            $rows = mysqli_affected_rows($stringConnection);

            if ($rows > 0) {
                $message = "Producto eliminado.";
            } else {
                $message = 'Error al eliminar producto.';
            }
        } else {
            $message = 'Error de conexion con la base de datos.';
        }

        return $message;
    }

    public static function eliminarProducto($producto_id, $codigo_pro)
    {

        /* Validacion existencia producto */
        $listaProductos = Producto::ListarProductosCodigo($codigo_pro);
        $existe = False;

        foreach ($listaProductos as $producto) {
            if ($producto['id_producto'] == $producto_id) {
                $existe = True;
            } else {
                $existe = False;
            }
        }


        if ($existe) {
            $stringConnection = Connection::conectar();
            $query = "DELETE FROM sucursal_has_productos WHERE producto_id_producto = $producto_id;";

            if (mysqli_query($stringConnection, $query)) {
                $rows = mysqli_affected_rows($stringConnection);

                if ($rows > 0) {
                    $message2 = Producto::eliminarProductoId($producto_id);
                    $message = "Producto sucursal eliminado. " . $message2;
                } else {
                    $message = 'Error producto Sucursal.';
                }
            } else {
                $message = 'Error de conexion con la base de datos.';
            }
        } else {
            $message = "El producto no existe o ya fue eliminado.";
        }

        return $message;
    }


    public static function actualizarProducto($codigo_pro, $nombre_pro, $precio_pro, $descripcion_pro)
    {

        /* Validacion existencia producto */
        $listaProductos = Producto::ListarProductosCodigo($codigo_pro);
        $existe = False;

        foreach ($listaProductos as $producto) {
            if ($producto['vch_codigo_pro'] == $codigo_pro) {
                $existe = True;
            } else {
                $existe = False;
            }
        }

        if ($existe) {
            $precio = (int) $precio_pro;
            $stringConnection = Connection::conectar();
            $query = "UPDATE producto SET vch_nombre_pro ='$nombre_pro', int_precio_pro = $precio, vch_descripcion_pro = '$descripcion_pro' WHERE vch_codigo_pro = '$codigo_pro';";

            if (mysqli_query($stringConnection, $query)) {
                $rows = mysqli_affected_rows($stringConnection);

                if ($rows > 0) {
                    $message = "Producto Actualizado. ";
                } else {
                    $message = 'Error al actualizar el producto.';
                }
            } else {
                $message = 'Error de conexion con la base de datos.';
            }
        } else {
            $message = "El producto no existe o ya fue eliminado.";
        }
        /* Actualizacion de producto */


        return $message;
    }
}
