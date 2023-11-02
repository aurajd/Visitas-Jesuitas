<?php
    require_once "../../modelo/mjesuita.php";
    class Jesuita{
        private $modeloJesuita = null;
        public $resultadoAccion = null;

        public function __construct() {
            $this->modeloJesuita = new MJesuita();
        }

        public function consultaIndividual($id){
            if(!$this->validarConsultaIndividual($id))
                return false;
            $resultado = $this->modeloJesuita->consultaIndividual($id);
            if($resultado === false){
                $this->resultadoAccion = $this->modeloJesuita->resultadoAccion;
                return false;
            }
            return $resultado;
        }

        public function eliminarFila($id){
            $resultado = $this->modeloJesuita->eliminarFila($id);
            return $resultado;
        }

        public function AnadirFila($id, $nombre, $firma){
            if($this->validar($id, $nombre, $firma)){
                $this->resultadoAccion = $this->modeloJesuita->anadirFila($id,$nombre,$firma);
            }
            return $this->resultadoAccion;
        }

        public function modificarFila($idOriginal, $id, $nombre, $firma){
            if($this->validar($id, $nombre, $firma)){
                $this->resultadoAccion = $this->modeloJesuita->modificarFila($idOriginal,$id,$nombre,$firma);
            }
            return $this->resultadoAccion;
        }

        public function validar($id, $nombre, $firma){
            if(empty($id)&&$id!=0||empty($nombre)||empty($firma)){
                $this->resultadoAccion = "Debes rellenar todos los campos.";
                return false;
            }
            if(!is_numeric($id)){
                $this->resultadoAccion =  "El número de puesto debe ser un número";
                return false;
            }
            return true;
        }

        public function validarConsultaIndividual($id){
            if(empty($id)&&$id!=0){
                $this->resultadoAccion = "Debes rellenar el número de puesto.";
                return false;
            }
            if(!is_numeric($id)){
                $this->resultadoAccion =  "El número de puesto debe ser un número";
                return false;
            }
            return true;
        }

    }
?>