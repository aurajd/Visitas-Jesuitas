<?php
    require_once "../../modelo/mlugar.php";
    class Lugar{
        private $modeloLugar = null;
        private $resultadoAccion = null;

        public function __construct() {
            $this->modeloLugar = new MLugar();
        }

        public function leer(){
            $this->resultadoAccion = $this->modeloLugar->leer();
            return $this->resultadoAccion;
        }

        public function consultaIndividual($ip){
            $this->resultadoAccion = $this->modeloLugar->consultaIndividual($ip);
            return $this->resultadoAccion;
        }

        public function eliminarFila($ip){
            $this->resultadoAccion = $this->modeloLugar->eliminarFila($ip);
            return $this->resultadoAccion;
        }

        public function anadirFila($ip, $lugar, $descripcion){
            if($this->validar($ip, $lugar)){
                $this->resultadoAccion = $this->modeloLugar->anadirFila($ip, $lugar, $descripcion);
            }
            return $this->resultadoAccion;
        }

        public function modificarFila($ipOriginal, $ip, $lugar, $descripcion){
            if($this->validar($ip,$lugar)) {
                $this->resultadoAccion = $this->modeloLugar->modificarFila( $ipOriginal, $ip, $lugar, $descripcion );
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