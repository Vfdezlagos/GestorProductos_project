<?php
include_once('Connection.php');

class Usuario
{

    public static function ListarUsuarios()
    {
        $stringConnection = Connection::conectar();
        $query = "SELECT * FROM usuario;";

        $result = mysqli_query($stringConnection, $query);
        mysqli_close($stringConnection);

        return $result;
    }
}
