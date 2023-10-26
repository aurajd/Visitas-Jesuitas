<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear filas</title>
    <link rel="stylesheet" href="../css/jesuitas.css">
</head>
<body>
    <a href="index.php">Volver al inicio</a>
    <?php
        require "jesuita.php";
        $crud = new Jesuita();
        if (isset($_GET["enviar"])) {
            $idJesuita = $_GET["idJesuita"];
            $nombre = $_GET["nombre"];
            $firma = $_GET["firma"];
            $crud->validarAnadirFila($idJesuita,$nombre,$firma);
            echo "<h3>".$crud->resultadoAccion."</h3>";
        }
    ?>
    <form action="crear.php" method="get">
        <h2>Creación nuevos jesuitas</h2>
        <div>
            <label for="idJesuita">IdJesuita:</label>
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