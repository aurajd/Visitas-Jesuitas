<?php
    require_once "../../modelo/modelo_lugar.php";
    class Lugar{
        private $resultadoAccion = null;
        private $modeloLugar = null;

        public function __construct() {
            $this->modeloLugar = new ModeloLugar();
        }

        public function leer(){
            $resultados = $this->modeloLugar->leer();
            return $resultados;
        }

        public function consultaIndividual($ip){
            $resultado = $this->modeloLugar->consultaIndividual($ip);
            return $resultado;
        }

        public function eliminarFila($ip){
            try{
                $this->modeloLugar->eliminarFila($ip);
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
            if($this->validar($ip, $lugar)){
                try{
                    $this->modeloLugar->anadirFila($ip, $lugar, $descripcion);
                    $this->resultadoAccion =  "El lugar ha sido introducido con éxito";
                } catch (mysqli_sql_exception $e) {
                    if( $e->getCode() == 1062){
                        $this->resultadoAccion =  "Ya existe un lugar con esa IP";
                    }
                    else {
                        $this->resultadoAccion = "Error inesperado, consulte con el administrador";
                    }
                }
            }
            return $this->resultadoAccion;
        }

        public function modificarFila($ipOriginal, $ip, $lugar, $descripcion){
            if($this->validar($ip,$lugar)) {
                try{
                    $this->modeloLugar->modificarFila( $ipOriginal, $ip, $lugar, $descripcion );
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