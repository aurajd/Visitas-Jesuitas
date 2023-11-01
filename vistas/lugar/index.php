
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud lugar</title>
    <link rel="stylesheet" href="../../css/index_lugar.css">
</head>

<body>
    <a href="../../index.html">Volver</a>
    <a href="anadir.php">Crear nuevo lugar</a>
    <?php
        if(isset($_GET["mensaje"])){
            echo "<h2>".$_GET["mensaje"]."</h2>";
        }
        require "../../controlador/lugar.php";
        $lugar = new Lugar();
    ?>
    <table>
        <tr>
            <th>
                IP
            </th>
            <th>
                Nombre
            </th>
            <th>
                Opciones
            </th>
        </tr>
        <?php
            $arrayLugares = $lugar->leer();
            foreach ($arrayLugares as $lugar) {
        ?>
        <tr>
            <td>
                <?php echo $lugar['ip'] ?>
            </td>
            <td>
                <?php echo $lugar['lugar'] ?>
            </td>
            <td>
                <?php 
                echo "<a href='borrar.php?ip=".$lugar["ip"]."'>borrar</a>";
                echo "<a href='modificar.php?ip=".$lugar["ip"]."'>modificar</a>";                
                ?>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>

</html>