<?php
    class Lugar{
        private $conexion;
        public $resultadoAccion = null;

        public function __construct() {
            require '../datosConexion.php';
            $this->conexion = new mysqli($servidorbd, $usuario, $contraseña, $basededatos);
            $this->conexion->set_charset("utf8");
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
        }

        public function validarAnadirFila($ip, $lugar, $descripcion){
            if(empty($ip)||empty($lugar)){
                $this->resultadoAccion = "Debes rellenar la IP y el lugar.";
            }else{
                if(!filter_var($ip, FILTER_VALIDATE_IP)){
                    $this->resultadoAccion =  "Debes introducir una IP válida";
                }else{
                    if(empty($descripcion)){
                        $consultaAnadir = "INSERT INTO lugar(ip,lugar) VALUES ('". $ip."','".$lugar."');";
                    }else{
                        $consultaAnadir = "INSERT INTO lugar VALUES ('". $ip."','".$lugar."','".$descripcion."');";
                    }
                    try{
                        echo $consultaAnadir;
                        $this->conexion -> query($consultaAnadir);
                        $this->resultadoAccion =  "El lugar ha sido introducido con éxito";
                    } catch (mysqli_sql_exception $e) {
                        if( $e->getCode() == 1062){
                            $this->resultadoAccion =  "Ya existe un lugar con esa IP";
                        }
                    }
                }
            }
        }


        public function modificarFila($ipOriginal, $ip, $lugar, $descripcion){
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
            $this->conexion -> query($consultaModificacion);
            $this->resultadoAccion =  "Modificación realizada con éxito";
        }


    }
?>