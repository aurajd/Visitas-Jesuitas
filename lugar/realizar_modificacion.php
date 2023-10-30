<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar lugar</title>
    <link rel="stylesheet" href="../css/lugar.css">

</head>
<body>
    <a href="index.php">Volver atrás</a>
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
                <h2>Modificación lugar</h2>
                <form action="modificar.php">
                    <?php
                        echo "<input type='text' name='ipOriginal' value='".$datosLugar['ip']."' hidden>";
                    ?>
                    <div>
                        <label for="ip">IP</label>
                        <?php
                            echo "<input type='text' name='ip' value='".$datosLugar['ip']."'>";
                        ?>
                    </div>
                    <div>
                        <label for="lugar">Lugar:</label>
                        <?php
                            echo "<input type='text' name='lugar' value='".$datosLugar['lugar']."'>";
                        ?>
                    </div>
                    <div>
                        <label for="descripcion">Descripción:</label>
                        <?php
                            echo "<input type='text' name='descripcion' value='".$datosLugar['descripcion']."'>";
                        ?>
                    </div>            
                    <input type="submit" name="modificar" value="Modificar">
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