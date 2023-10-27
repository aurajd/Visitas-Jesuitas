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

        public function consultaColumnaOrdenada($columna, $tabla){
            $query = "SELECT $columna FROM $tabla order by $columna";
            $resultado = $this->conexion->query($query);
            while($fila = $resultado->fetch_assoc()){
                $nombre[] = $fila["$columna"];
            }
            return $nombre;
        }

        public function consultaNombre(){
            return $this->consultaColumnaOrdenada("nombre","jesuita");
        }

        public function consultaFirma(){
            return $this->consultaColumnaOrdenada("firma","jesuita");
        }

        public function consultaLugar(){
            return $this->consultaColumnaOrdenada("lugar","lugar");
        }
        
        public function comprobarJesuita($nombre,$firma){
            $query = "select idJesuita from jesuita where nombre='".$nombre."' and firma='".$firma."';";
            $idJesuita = $this->conexion->query($query);
            var_dump($idJesuita);
            if($this->conexion->affected_rows >0){
                return true;
            }
            return false;
        }
    }
?>