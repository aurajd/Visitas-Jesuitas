<?php
    class Conectar{
        protected $conexion;

        public function __construct(){
            include '../configdb.php';
            $this->conexion = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);
            $this->conexion->set_charset("utf8");
        }
    }
?>