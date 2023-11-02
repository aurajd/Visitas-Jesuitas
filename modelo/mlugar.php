<?php
    require_once "conectar.php";
    class MLugar extends Conectar{
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
            try{
                $this->conexion -> query($consultaEliminar);
                $this->resultadoAccion =  "El lugar ha sido eliminado con éxito";
            } catch (mysqli_sql_exception $e) {
                if( $e->getCode() == 1451){
                    $this->resultadoAccion = "El lugar tiene visitas realizadas, no se puede modificar";
                }
                else {
                    $this->resultadoAccion = "Error inesperado, consulte con el administrador";
                }
            }
            return $this->resultadoAccion;
        }

        public function anadirFila($ip, $lugar, $descripcion){
            if(empty($descripcion)){
                $descripcion="NULL";
            }
            else{
                $descripcion= "'".$descripcion."'";
            }
            $consultaAnadir = "INSERT INTO lugar VALUES ('". $ip."','".$lugar."',".$descripcion.");";
            try{
                $this->conexion -> query($consultaAnadir);
                $this->resultadoAccion =  "El lugar ha sido introducido con éxito";
            } catch (mysqli_sql_exception $e) {
                if( $e->getCode() == 1062){
                    $this->resultadoAccion =  "Ya existe un lugar con esa IP";
                }
                else {
                    $this->resultadoAccion = "Error inesperado, consulte con el administrador";
                }
            }
            return $this->resultadoAccion;
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
            try{
                $this->conexion -> query($consultaModificacion);
                $this->resultadoAccion =  "Modificación realizada con éxito";
            } catch (mysqli_sql_exception $e) {
                if( $e->getCode() == 1062){
                    $this->resultadoAccion =  "Ya existe un lugar con esa IP";
                }
                if( $e->getCode() == 1451){
                    $this->resultadoAccion = "El lugar tiene visitas realizadas, no se puede modificar la ip";
                }
                else {
                    $this->resultadoAccion = "Error inesperado, consulte con el administrador";
                }
            }
            return $this->resultadoAccion;
        }
    }
?>