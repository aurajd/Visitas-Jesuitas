<?php
    require_once "conectar.php";
    class Lugar extends Conectar{
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
            $query = "SELECT * FROM lugar where ip = '".$ip."';";
            $resultado = $this->conexion->query($query);
            return $resultado->fetch_assoc();
        }

        public function eliminarFila($ip){
            $consultaEliminar = "DELETE FROM lugar WHERE ip = '".$ip."';";
            $this->conexion->query($consultaEliminar);
            $this->resultadoAccion = "Borrado con éxito";
            return $this->resultadoAccion;
        }

        public function anadirFila($ip, $lugar, $descripcion){
            if($this->validar($ip, $lugar)){
                if(empty($descripcion)){
                    $descripcion="NULL";
                }else{
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
                        echo "<p>".$e->getMessage()."</p>";
                        $this->resultadoAccion = "Error inesperado, consulte con el administrador";
                    }
                }
            }
            return $this->resultadoAccion;
        }

        public function modificarFila($ipOriginal, $ip, $lugar, $descripcion){
            if($this->validar($ip,$lugar)) {
                if(empty($descripcion)){
                    $consultaModificacion = "UPDATE lugar 
                    SET ip = '".$ip."', lugar = '".$lugar."', descripcion = NULL
                    WHERE ip = '".$ipOriginal."';";
                }
                else{
                    $consultaModificacion = "UPDATE lugar 
                    SET ip = '".$ip."', lugar = '".$lugar."', descripcion = '".$descripcion."'
                    WHERE ip = '".$ipOriginal."';";
                }
                try{
                    $this->conexion -> query($consultaModificacion);
                    $this->resultadoAccion =  "Modificación realizada con éxito";
                } catch (mysqli_sql_exception $e) {
                    if( $e->getCode() == 1062){
                        $this->resultadoAccion =  "Ya existe un lugar con esa IP";
                    }
                    else {
                        echo "<p>".$e->getMessage()."</p>";
                        $this->resultadoAccion = "Error inesperado, consulte con el administrador";
                    }
                }
            }
            return $this->resultadoAccion;
        }

        public function validar($ip, $lugar){
            if(empty($ip) && empty($lugar)){
                $this->resultadoAccion = "Debes rellenar la IP y el lugar.";
                return false;
            }
            if(empty($ip)){
                $this->resultadoAccion = "Debes rellenar la IP.";
                return false;
            }
            if(empty($lugar)){
                $this->resultadoAccion = "Debes rellenar el lugar.";
                return false;
            }
            if(!filter_var($ip, FILTER_VALIDATE_IP)){
                $this->resultadoAccion =  "Debes introducir una IP válida";
                return false;
            }
            return true;
        }
    }
?>