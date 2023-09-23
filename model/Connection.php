<?php

class Connection
{

    public static function conectar()
    {
        $host = '127.0.0.1';
        $user = 'root';
        $pass = '';
        $dbname = 'mydb';

        try {
            $stringConnection = mysqli_connect($host, $user, $pass, $dbname);
            return $stringConnection;
        } catch (mysqli_sql_exception $e) {
            print $e->getMessage();
            exit();
        }
    }
}
