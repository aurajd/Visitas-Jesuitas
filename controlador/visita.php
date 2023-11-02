<?php
    require_once "../../modelo/mvisita.php";
    class Visita{
        private $modeloVisita = null;

        public function __construct() {
            $this->modeloVisita = new MVisita();
        }


        public function leer(){
            $resultado = $this->modeloVisita->leer();
            return $resultado;
        }
        public function consultaNombre(){
            $resultado = $this->modeloVisita->consultaColumnaOrdenada("nombre","jesuita");
            return $resultado;
        }

        public function consultaFirma(){
            $resultado = $this->modeloVisita->consultaColumnaOrdenada("firma","jesuita");
            return $resultado;
        }

        public function consultaLugar(){
            $resultado = $this->modeloVisita->consultaColumnaOrdenada("lugar","lugar");
            return $resultado;
        }
        
        public function comprobarJesuita($nombre,$firma){
            $resultado = $this->modeloVisita->comprobarJesuita($nombre,$firma);
            return $resultado;
        }
    }
?>