<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar visita</title>
    <link rel="stylesheet" href="../../css/visita.css">

</head>
<body>
    <a href="index.html">Volver atrás</a>
    <form action="elegir_lugar.php">
        <div>
            <label for="nombre">Nombre:</label>
            <select name="nombre">
                <?php
                    require "../../controlador/visita.php";
                    $visita = new Visita();
                    $arrayNombres = $visita->consultaNombre();
                    foreach($arrayNombres as $nombre){
                        echo "<option id=".$nombre.">".$nombre."</option>";
                    }
                ?>
            </select>
        </div>
        <div>
            <label for="firma">Firma:</label>
            <select name="firma">
                <?php
                    $arrayFirmas = $visita->consultaFirma();
                    foreach($arrayFirmas as $firma){
                        echo "<option id=".$firma.">".$firma."</option>";
                    }
                ?>
            </select>
        </div>
        <input type="submit" name="inicio" value="Iniciar sesión">
    </form>
</body>
</html>