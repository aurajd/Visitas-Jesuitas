<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar lugar</title>
    <link rel="stylesheet" href="estilo_crud.css">
</head>
<body>
    <a href="index.html">Volver atrás</a>
    <?php
        if(isset($_GET["modificar"])){
            require "lugar.php";
            $lugarAnadir = new Lugar();
            $ip = $_GET["ip"];
            $lugar = $_GET["lugar"];
            $descripcion = $_GET["descripcion"];
            $lugarAnadir->modificarFila($ip,$lugar,$descripcion);
            echo "<h3>".$lugarAnadir->resultadoAccion."</h3>";
        }
    ?>
    <form action="modificar2.php" method="get">
        <h2>¿Qué lugar deseas modificar?</h2>
        <div>
            <label for="idJesuita">IP:</label>
            <input type="text" name="ip">
        </div>
        <input type="submit" name="enviar">
    </form>
</body>
</html>