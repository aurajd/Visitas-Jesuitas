<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista lugares</title>
    <link rel="stylesheet" href="../css/lugar.css">
</head>
<body>
    <a href="index.html">Volver atrás</a>
    <main>
        <?php
            require "../clases/lugar.php";
            $lugar = new Lugar();
        ?>
        <table>
            <tr>
                <th>
                    IP
                </th>
                <th>
                    Lugar
                </th>
                <th>
                    Descripción
                </th>
            </tr>
            <?php
                $arraylugares = $lugar->leer();
                foreach ($arraylugares as $lugar) {
            ?>
            <tr>
                <td>
                    <?php echo $lugar['ip'] ?>
                </td>
                <td>
                    <?php echo $lugar['lugar'] ?>
                </td>
                <td>
                    <?php echo $lugar['descripcion'] ?>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </main>
</body>
</html>