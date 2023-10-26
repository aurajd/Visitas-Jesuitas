<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar visita</title>
    <link rel="stylesheet" href="../css/visita.css">

</head>
<body>
    <a href="realizar.php">Volver atrás</a>
    <?php
        require("../clases/visita.php");
        $visita = new Visita();
        if($visita->comprobarJesuita($_GET["nombre"],$_GET["firma"])) {
            echo "<p>Sesión iniciada</p>";
        }
        else {
            echo "<p>Jesuita y firma incorrectas</p>";
        }
    ?>
</body>
</html>