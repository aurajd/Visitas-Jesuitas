<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar visita</title>
    <link rel="stylesheet" href="../css/visita.css">

</head>
<body>
    <a href="index.html">Volver atrás</a>
    <form action="elegir_lugar.php">
        <div>
            <label for="nombre">Nombre:</label>
            <select name="nombre">
                <?php
                    require("../clases/jesuita.php");
                    $jesuitaObj = new Jesuita();
                    $arrayJesuitas = $jesuitaObj->leer();
                    foreach($arrayJesuitas as $jesuita){
                        echo "<option id=".$jesuita["nombre"].">".$jesuita["nombre"]."</option>";
                    }
                ?>
            </select>
        </div>
        <div>
            <label for="firma">Firma:</label>
            <select name="firma">
            <?php
                    foreach($arrayJesuitas as $jesuita){
                        echo "<option id=".$jesuita["firma"].">".$jesuita["firma"]."</option>";
                    }
                ?>
            </select>
        </div>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>