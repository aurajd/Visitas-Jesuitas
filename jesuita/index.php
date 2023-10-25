
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Jesuitas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="..">Volver</a>
    <a href="crear.php">Crear nuevo jesuita</a>
    <?php
        require "jesuita.php";
        $crud = new Jesuita();
        if(isset($_GET["borrar"])){
            $idJesuita = $_GET["idJesuita"];
            $crud->eliminarFila($idJesuita);
            echo "<h3>".$crud->resultadoAccion."</h3>";
        }
        if(isset($_GET["modificar"])){
            $idJesuitaOriginal = $_GET["idJesuitaOriginal"];
            $idJesuita = $_GET["idJesuita"];
            $nombre = $_GET["nombre"];
            $firma = $_GET["firma"];
            //Esto da fatal error si cambiamos la id de un jesuita con visitas realizada, porque no tiene on update cascade
            //Es un problema de la base de datos no del programa 
            $crud->modificarFila($idJesuitaOriginal,$idJesuita,$nombre,$firma);
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
                    <input type='hidden' name='idJesuitaOriginal' value='<?php echo $jesuita['idJesuita'] ?>'>
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