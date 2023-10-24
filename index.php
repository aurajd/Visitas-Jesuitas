
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Jesuitas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="crear.php">Crear nuevo jesuita</a>
    <?php
        require "crudJesuita.php";
        $crud = new CrudJesuita();
        if(isset($_GET["borrar"])){
            $idJesuita = $_GET["idJesuita"];
            $crud->eliminarFila($idJesuita);
            echo "<h3>".$crud->resultadoAccion."</h3>";
        }
        if(isset($_GET["modificar"])){
            $idJesuita = $_GET["idJesuita"];
            $nombre = $_GET["nombre"];
            $firma = $_GET["firma"];
            $crud->modificarFila($idJesuita,$nombre,$firma);
            echo "<h3>".$crud->resultadoAccion."</h3>";
        }
    ?>
    <table>
        <tr>
            <th>
                IdJesuita
            </th>
            <th>
                Nombre
            </th>
            <th>
                Firma
            </th>
            <th>
                Acción
            </th>
        </tr>
        <?php
            $arrayJesuitas = $crud->leer();
            foreach ($arrayJesuitas as $jesuita) {
        ?>
        <tr>
            <td>
                <?php echo $jesuita['idJesuita'] ?>
            </td>
            <td>
                <?php echo $jesuita['nombre'] ?>
            </td>
            <td>
                <?php echo $jesuita['firma'] ?>
            </td>
            <td>
                <form action='modificar.php' method='get'> 
                    <input type='hidden' name='idJesuita' value='<?php echo $jesuita['idJesuita'] ?>'>
                    <input type='hidden' name='nombre' value='<?php echo $jesuita['nombre'] ?>'>
                    <input type='hidden' name='firma' value='<?php echo $jesuita['firma'] ?>'>
                    <input type='submit' name='modificar' value='Modificar'>
                </form>
                <form action="index.php">
                    <input type='hidden' name='idJesuita' value='<?php echo $jesuita['idJesuita'] ?>'>
                    <input type='submit' name='borrar' value='Borrar'>
                </form>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>

</html>