<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar lugar</title>
    <link rel="stylesheet" href="../css/lugar.css">
</head>
<body>
    <a href="index.html">Volver atrás</a>
    <?php
        if(isset($_GET["modificar"])){
            require "../clases/jesuita.php";
            $jesuita = new Jesuita();
            $idJesuitaOriginal = $_GET["idJesuitaOriginal"];
            $idJesuita = $_GET["idJesuita"];
            $nombre = $_GET["nombre"];
            $firma = $_GET["firma"];
            //Esto da fatal error si cambiamos la ip de un lugar con visitas realizada, porque no tiene on update cascade
            //Es un problema de la base de datos no del programa 
            $resultado = $jesuita->modificarFila($idJesuitaOriginal,$idJesuita,$nombre,$firma);
            echo "<h3>".$resultado."</h3>";
        }
    ?>
    <form action="modificar2.php" method="get">
        <h2>¿Qué jesuita deseas modificar?</h2>
        <div>
            <label for="idJesuita">Número de puesto:</label>
            <input type="text" name="idJesuita">
        </div>
        <input type="submit" name="enviar">
    </form>
</body>
</html>