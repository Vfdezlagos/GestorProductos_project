<?php
include_once('Connection.php');

class Sucursal
{

    public static function ListarSucursales()
    {
        $stringConnection = Connection::conectar();

        $query = "SELECT * FROM sucursal;";

        $result = mysqli_query($stringConnection, $query);

        mysqli_close($stringConnection);

        return $result;
    }
}
