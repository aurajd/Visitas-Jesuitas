<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar visita</title>
    <link rel="stylesheet" href="../../css/visita.css">

</head>
<body>
    <a href="realizar.php">Volver atrás</a>
    <?php
        require("../../controlador/visita.php");
        $visita = new Visita();
        $idJesuita = $visita->comprobarJesuita($_GET["nombre"],$_GET["firma"]);
        if($idJesuita) {
            echo "<p>Sesión iniciada</p>";
            ?>
            <form action="">
                <input type="text" name="idJesuita" hidden>
                <div>
                    <label for="lugar">Lugar:</label>
                    <select name="lugar">
                        <?php
                            $arrayLugares = $visita->consultaLugar();
                            foreach($arrayLugares as $lugar){
                                echo "<option id=".$lugar.">".$lugar."</option>";
                            }
                        ?>
                    </select>
                </div>
                    <input type="submit" name="enviar" value="Enviar lugar">
                
            </form>
            <?php
        }
        else {
            echo "<p>Jesuita y firma incorrectas</p>";
        }
    ?>
</body>
</html>