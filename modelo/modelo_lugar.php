<?php
    require_once "conectar.php";
    class ModeloLugar extends Conectar{
        private $resultadoAccion = null;

        public function __construct() {
            parent::__construct();
        }

        public function leer(){
            $query = "SELECT * FROM lugar";
            $resultado = $this->conexion->query($query);
            while($fila = $resultado->fetch_assoc()){
                $filas[] = $fila;
            }
            return $filas;
        }

        public function consultaIndividual($ip){
            $consulta = "SELECT * FROM lugar where ip = '".$ip."';";
            $resultado = $this->conexion->query($consulta);
            return $resultado->fetch_assoc();
        }

        public function eliminarFila($ip){
            $consultaEliminar = "DELETE FROM lugar WHERE ip = '".$ip."';";
            $this->conexion -> query($consultaEliminar);
        }

        public function anadirFila($ip, $lugar, $descripcion){
            if(empty($descripcion)){
                $descripcion="NULL";
            }
            else{
                $descripcion= "'".$descripcion."'";
            }
            $consultaAnadir = "INSERT INTO lugar VALUES ('". $ip."','".$lugar."',".$descripcion.");";
            $this->conexion -> query($consultaAnadir);
        }

        public function modificarFila($ipOriginal, $ip, $lugar, $descripcion){
            if(empty($descripcion)){
                $descripcion= "NULL";
            }
            else{
                $descripcion= "'".$descripcion."'";
            }
            $consultaModificacion = "UPDATE lugar 
                SET ip = '".$ip."', lugar = '".$lugar."', descripcion = ".$descripcion."
                WHERE ip = '".$ipOriginal."';";
            $this->conexion -> query($consultaModificacion);
        }
    }
?>