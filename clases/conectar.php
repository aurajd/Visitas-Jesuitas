<?php
    class Conectar{
        protected $conexion;

        public function __construct(){
            include '../configdb.php';
            $this->conexion = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);
            $this->conexion->set_charset("utf8");
            
            $controlador = new mysqli_driver();
            $controlador->report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;
        }
    }
?>