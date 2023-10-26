<?php
    require_once "conectar.php";
    class Visita extends Conectar{
        public $resultadoAccion = null;

        public function __construct() {
            parent::__construct();
        }

        public function leer(){
            $query = "SELECT * FROM visita 
                ORDER BY fechaHora DESC
                LIMIT 5";
            $resultado = $this->conexion->query($query);
            while($fila = $resultado->fetch_assoc()){
                $filas[] = $fila;
            }
            return $filas;
        }
    }
?>