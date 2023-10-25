<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear filas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if(isset($_GET["modificar"])){
        echo "<form action='index.php' method='get'>
            <h2>Modificación jesuitas</h2>
            <div>
                <label for='idJesuitaOriginal'>IdJesuita Original:</label>
                <input type='text' name='idJesuitaOriginal' value='".$_GET["idJesuitaOriginal"]."' readonly>
            </div>
            <div>
                <label for='idJesuita'>IdJesuita nueva (Puedes dejarla igual):</label>
                <input type='text' name='idJesuita' value='".$_GET["idJesuita"]."'>
            </div>
            <div>
                <label for='nombre'>Nombre:</label>
                <input type='text' name='nombre' value='".$_GET["nombre"]."'>
            </div>
            <div>
                <label for='firma'>Firma:</label>
                <input type='text' name='firma'  value='".$_GET["firma"]."'>
            </div>
            <input type='submit' name='modificar'>
        </form>";
    }
    else{
        echo "No deberías estar aquí";
    }
    ?>
</body>
</html>