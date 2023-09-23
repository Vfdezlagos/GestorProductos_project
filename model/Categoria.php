<?php
include_once('Connection.php');

class Categoria
{

    public static function ListarCategorias()
    {
        $stringConnection = Connection::conectar();

        $query = "SELECT * FROM categoria;";

        $result = mysqli_query($stringConnection, $query);

        mysqli_close($stringConnection);

        return $result;
    }
}
