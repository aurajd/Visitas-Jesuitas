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
            require "../clases/lugar.php";
            $lugar = new Lugar();
            $resultado= $lugar -> eliminarFila($ip);
            echo "<h2>".$resultado."</h2>";
        }
    ?>
    <form action="borrar2.php" method="get">
        <h2>¿Qué lugar deseas eliminar?</h2>
        <div>
            <label for="ip">IP:</label>
            <input type="text" name="ip">
        </div>
        <input type="submit" name="enviar">
    </form>
</body>
</html>