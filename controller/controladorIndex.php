<h1>controlador Index</h1>

<?php
include_once('../model/Usuario.php');

$usuarios = Usuario::ListarUsuarios();

$valido = false;

//extrae los keys y su valor y los convierte en variables. ej: $_POST['usuario'] = 'admin', pasaria a ser $usuario = 'admin'.
extract($_POST);

foreach ($usuarios as $usuario) {
    if ($usuario['vch_nombre_usu'] == $nombreUsuario && $usuario['vch_contrasenia_usu'] == $passwordUsuario) {
        $valido = true;
    }
}

if ($valido) {
    //redirige a main.php
    header("Location: ../view/main.php");
    die();
} else {
    //devuelve a index.php
    header("Location: ../index.php?Error");
    die();
}
?>