<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear filas</title>
    <link rel="stylesheet" href="estilo_crud.css">
</head>
<body>
    <a href="index.html">Volver atrás</a>
    <?php
        if (isset($_GET["enviar"])) {
            require "lugar.php";
            $lugarAnadir = new Lugar();
            $ip = $_GET["ip"];
            $lugar = $_GET["lugar"];
            $descripcion = $_GET["descripcion"];
            $lugarAnadir->validarAnadirFila($ip,$lugar,$descripcion);
            echo "<h3>".$lugarAnadir->resultadoAccion."</h3>";
        }
    ?>
    <form action="#.php" method="get">
        <h2>Creación nuevos lugares</h2>
        <div>
            <label for="idJesuita">IP:</label>
            <input type="text" name="ip">
        </div>
        <div>
            <label for="nombre">Lugar:</label>
            <input type="text" name="lugar">
        </div>
        <div>
            <label for="firma">Descripción:</label>
            <input type="text" name="descripcion">
        </div>
        <input type="submit" name="enviar">
    </form>
</body>
</html>