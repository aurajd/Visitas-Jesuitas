<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar jesuita</title>
    <link rel="stylesheet" href="../css/lugar.css">
</head>
<body>
    <a href="index.html">Volver atrás</a>
    <?php
        if(isset($_GET["borrar"])){
            $idJesuita = $_GET["idJesuita"];
            require "../clases/jesuita.php";
            $jesuita = new Jesuita();
            $resultado= $jesuita -> eliminarFila($idJesuita);
            echo "<h2>".$resultado."</h2>";
        }
    ?>
    <form action="borrar2.php" method="get">
        <h2>¿Qué Jesuita deseas eliminar?</h2>
        <div>
            <label for="idJesuita">Número de puesto:</label>
            <input type="text" name="idJesuita">
        </div>
        <input type="submit" name="enviar">
    </form>
</body>
</html>