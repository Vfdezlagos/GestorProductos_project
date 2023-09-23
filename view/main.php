<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <!-- Barra de navegacion -->
    <div class="container-fluid bg-dark mb-5">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="./main.php" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="./registrar.php" class="nav-link">Registrar</a></li>
                <li class="nav-item"><a href="./consultar.php" class="nav-link">Consultar</a></li>
                <li class="nav-item"><a href="./actualizar.php" class="nav-link">Actualizar</a></li>
                <li class="nav-item"><a href="./eliminar.php" class="nav-link">Eliminar</a></li>
                <li class="nav-item"><a href="../index.php" class="nav-link text-danger">Salir</a></li>
            </ul>
        </header>
    </div>

    <div class="formulario content">
        <h1>Seleccione una opción</h1>

        <div class="input col-auto my-3">
            <a href="./consultar.php"><button class="btn consultar btn btn-secondary">Consultar Productos</button></a>
        </div>
        <div class="input col-auto my-3">
            <a href="./registrar.php"><button class="btn registrar btn-secondary">Registrar Productos</button></a>
        </div>
        <div class="input col-auto my-3">
            <a href="./actualizar.php"><button class="btn actualizar btn-secondary">Actualizar Productos</button></a>
        </div>
        <div class="input col-auto my-3">
            <a href="./eliminar.php"><button class="btn eliminar btn-danger">Eliminar Productos</button></a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>