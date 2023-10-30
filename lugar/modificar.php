<?php
    if(isset($_GET["modificar"])){
        require "../clases/lugar.php";
        $lugarModificar = new Lugar();
        $ipOriginal = $_GET["ipOriginal"];
        $ip = $_GET["ip"];
        $lugar = $_GET["lugar"];
        $descripcion = $_GET["descripcion"];
        //Esto da fatal error si cambiamos la ip de un lugar con visitas realizada, porque no tiene on update cascade
        //Es un problema de la base de datos no del programa 
        $resultado = $lugarModificar->modificarFila($ipOriginal,$ip,$lugar,$descripcion);
    }
    header("Location:index.php?mensaje=$resultado");
?>