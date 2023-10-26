<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar borrado</title>
    <link rel="stylesheet" href="../css/lugar.css">

</head>
<body>
    <a href="borrar.php">Volver atrás</a>
    <?php
        if(empty($_GET["ip"])){
            echo "<h2>Debes Introducir una IP</h2>";
        }else{
            $ip = $_GET["ip"];
            require "../clases/lugar.php";
            $lugar = new Lugar();
            $datosLugar = $lugar -> consultaIndividual($ip);
            if(isset($datosLugar)){
                ?>
                <h2>¿Estás seguro de querer eliminar el lugar con los siguientes datos?</h2>
                <form action="borrar.php">
                    <div>
                        <label for="ip">IP:</label>
                        <?php
                            echo "<input type='text' name='ip' value='".$datosLugar['ip']."' readonly>";
                        ?>
                    </div>
                    <div>
                        <label for="lugar">Lugar:</label>
                        <?php
                            echo "<input type='text' name='lugar' value='".$datosLugar['lugar']."' readonly>";
                        ?>
                    </div>
                    <?php
                        if(isset($datosLugar['descripcion'])){
                    ?>
                        <div>
                            <label for="descripcion">Descripción:</label>
                            <?php
                                echo "<input type='text' name='lugar' value='".$datosLugar['descripcion']."' readonly>";
                            ?>
                        </div>
                    <?php
                        }
                    ?>
                    <input type="submit" name="borrar" value="Borrar">
                </form>
                <?php
            }
            else{
                echo "<h2>No existe ningún lugar con esa IP</h2>";
            }
        }
    ?>
</body>
</html>