<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir lugar</title>
    <link rel="stylesheet" href="../css/lugar.css">
</head>
<body>
    <a href="index.php">Volver atrás</a>
    <?php
        if (isset($_GET["enviar"])) {
            require "../clases/lugar.php";
            $lugarAnadir = new Lugar();
            $ip = $_GET["ip"];
            $lugar = $_GET["lugar"];
            $descripcion = $_GET["descripcion"];
            $resultado = $lugarAnadir->AnadirFila($ip,$lugar,$descripcion);
            echo "<h3>".$resultado."</h3>";
        }
    ?>
    <form action="#.php" method="get">
        <h2>Creación nuevos lugares</h2>
        <div>
            <label for="ip">IP:</label>
            <input type="text" name="ip">
        </div>
        <div>
            <label for="lugar">Lugar:</label>
            <input type="text" name="lugar">
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion">
        </div>
        <input type="submit" name="enviar">
    </form>
</body>
</html>