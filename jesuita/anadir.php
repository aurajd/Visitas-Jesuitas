<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir jesuita</title>
    <link rel="stylesheet" href="../css/lugar.css">
</head>
<body>
    <a href="index.html">Volver atrás</a>
    <?php
        if (isset($_GET["enviar"])) {
            require "../clases/jesuita.php";
            $jesuita = new Jesuita();
            $idJesuita = $_GET["idJesuita"];
            $nombre = $_GET["nombre"];
            $firma = $_GET["firma"];
            $resultado = $jesuita->AnadirFila($idJesuita, $nombre, $firma);
            echo "<h3>".$resultado."</h3>";
        }
    ?>
    <form action="#.php" method="get">
        <h2>Creación nuevos jesuitas</h2>
        <div>
            <label for="idJesuita">Número de puesto:</label>
            <input type="text" name="idJesuita">
        </div>
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre">
        </div>
        <div>
            <label for="firma">Firma:</label>
            <input type="text" name="firma">
        </div>
        <input type="submit" name="enviar">
    </form>
</body>
</html>