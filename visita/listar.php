<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lugar</title>
    <link rel="stylesheet" href="estilo_crud.css">
</head>
<body>
    <a href="index.html">Volver atrás</a>
    <main>
        <?php
            require "visita.php";
            $visita = new Visita();
        ?>
        <table>
            <tr>
                <th>
                    idVisita
                </th>
                <th>
                    idJesuita
                </th>
                <th>
                    IP
                </th>
                <th>
                    Fecha-Hora
                </th>
            </tr>
            <?php
                $arrayVisitas = $visita->leer();
                foreach ($arrayVisitas as $filaVisita) {
            ?>
            <tr>
                <td>
                    <?php echo $filaVisita['idVisita'] ?>
                </td>
                <td>
                    <?php echo $filaVisita['idJesuita'] ?>
                </td>
                <td>
                    <?php echo $filaVisita['ip'] ?>
                </td>
                <td>
                    <?php echo $filaVisita['fechaHora'] ?>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </main>
</body>
</html>