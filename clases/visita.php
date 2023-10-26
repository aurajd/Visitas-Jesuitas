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

        public function consultaNombres(){
            $query = "SELECT nombre FROM jesuita";
            $resultado = $this->conexion->query($query);
            while($fila = $resultado->fetch_assoc()){
                $nombre[] = $fila;
            }
            return $nombre;
        }

        public function consultaFirmas(){
            $query = "SELECT firma FROM jesuita";
            $resultado = $this->conexion->query($query);
            while($fila = $resultado->fetch_assoc()){
                $nombre[] = $fila;
            }
            return $nombre;
        }
        
        public function comprobarJesuita($nombre,$firma){
            $query = "select * from jesuita where nombre='".$nombre."' and firma='".$firma."';";
            $this->conexion->query($query);
            if($this->conexion->affected_rows >0){
                return true;
            }
            return false;
        }
    }
?>