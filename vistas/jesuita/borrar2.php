<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar borrado</title>
    <link rel="stylesheet" href="../../css/lugar.css">

</head>
<body>
    <a href="borrar.php">Volver atrás</a>
    <?php
        $idJesuita = $_GET["idJesuita"];
        require "../../controlador/jesuita.php";
        $jesuita = new Jesuita();
        $datosJesuita = $jesuita -> consultaIndividual($idJesuita);
        if(!$datosJesuita) {
            echo "<h3>".$jesuita->resultadoAccion."</h3>";
        } else {
            ?>
            <h2>¿Estás seguro de querer eliminar el lugar con los siguientes datos?</h2>
            <form action="borrar.php">
                <div>
                    <label for="idJesuita">Número de puesto:</label>
                    <?php
                        echo "<input type='text' name='idJesuita' value='".$datosJesuita['idJesuita']."' readonly>";
                    ?>
                </div>
                <div>
                    <label for="nombre">Nombre:</label>
                    <?php
                        echo "<input type='text' name='nombre' value='".$datosJesuita['nombre']."' readonly>";
                    ?>
                </div>
                <div>
                    <label for="firma">Firma:</label>
                    <?php
                        echo "<input type='text' name='firma' value='".$datosJesuita['firma']."' readonly>";
                    ?>
                </div>
                
                <input type="submit" name="borrar" value="Borrar">
            </form>
            <?php
        }
    ?>
</body>
</html>