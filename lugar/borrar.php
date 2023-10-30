<?php
    if(isset($_GET["borrar"])){
        $ip = $_GET["ip"];
        require "../clases/lugar.php";
        $lugar = new Lugar();
        $resultado= $lugar -> eliminarFila($ip);
    }
    header("Location:index.php?mensaje=$resultado");
?>