<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar lugar</title>
    <link rel="stylesheet" href="../css/lugar.css">
</head>
<body>
    <a href="index.html">Volver atrás</a>
    <?php
        if(isset($_GET["borrar"])){
            $ip = $_GET["ip"];
            require "lugar.php";
            $lugar = new Lugar();
            $lugar -> eliminarFila($ip);
            echo "<h2>".$lugar-> resultadoAccion."</h2>";
        }
    ?>
    <form action="borrar2.php" method="get">
        <h2>¿Qué lugar deseas eliminar?</h2>
        <div>
            <label for="idJesuita">IP:</label>
            <input type="text" name="ip">
        </div>
        <input type="submit" name="enviar">
    </form>
</body>
</html>