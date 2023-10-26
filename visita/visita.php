<?php
    require_once "../conectar.php";
    class Visita extends Conectar{
        public $resultadoAccion = null;

        public function __construct() {
            parent::__construct();
        }

        public function leer(){
            $query = "SELECT * FROM visita";
            $resultado = $this->conexion->query($query);
            while($fila = $resultado->fetch_assoc()){
                $filas[] = $fila;
            }
            return $filas;
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



    }
?>