<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar lugar</title>
    <link rel="stylesheet" href="../css/lugar.css">

</head>
<body>
    <a href="modificar.php">Volver atrás</a>
    <?php
        $idJesuita = $_GET["idJesuita"];
        require "../clases/jesuita.php";
        $jesuita = new Jesuita();
        $datosJesuita = $jesuita -> consultaIndividual($idJesuita);
        if(!$datosJesuita) {
            echo "<h3>".$jesuita->resultadoAccion."</h3>";
        } else {
            ?>
            <h2>Modificación jesuita</h2>
            <form action="modificar.php">
                <?php
                    echo "<input type='text' name='idJesuitaOriginal' value='".$datosJesuita['idJesuita']."' hidden>";
                ?>
                <div>
                    <label for="idJesuita">Número de puesto:</label>
                    <?php
                        echo "<input type='text' name='idJesuita' value='".$datosJesuita['idJesuita']."'>";
                    ?>
                </div>
                <div>
                    <label for="nombre">Lugar:</label>
                    <?php
                        echo "<input type='text' name='nombre' value='".$datosJesuita['nombre']."'>";
                    ?>
                </div>
                <div>
                    <label for="firma">Firma:</label>
                    <?php
                        echo "<input type='text' name='firma' value='".$datosJesuita['firma']."'>";
                    ?>
                </div>            
                <input type="submit" name="modificar" value="Modificar">
            </form>
            <?php
        }
    ?>
</body>
</html>