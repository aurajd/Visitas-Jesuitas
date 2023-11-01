<?php
    require_once "conectar.php";
    class Jesuita extends Conectar{
        public $resultadoAccion = null;

        public function __construct() {
            parent::__construct();
        }

        public function leer(){
            $query = "SELECT * FROM jesuita";
            $resultado = $this->conexion->query($query);
            while($fila = $resultado->fetch_assoc()){
                $filas[] = $fila;
            }
            return $filas;
        }

        public function consultaIndividual($id){
            if(!$this->validarConsultaIndividual($id))
                return false;
            $query = "SELECT * FROM jesuita where idJesuita = '".$id."';";
            $resultado = $this->conexion->query($query);
            $jesuita = $resultado->fetch_assoc();
            if(empty($jesuita)){
                $this->resultadoAccion =  "El número de puesto no corresponde con ningún jesuita";
                return false;
            }
            return $jesuita;
        }

        public function eliminarFila($id){
            $consultaEliminar = "DELETE FROM jesuita WHERE idJesuita = ".$id.";";
            $this->conexion->query($consultaEliminar);
            $this->resultadoAccion = "Borrado con éxito";
            return $this->resultadoAccion;
        }

        public function AnadirFila($id, $nombre, $firma){
            if($this->validar($id, $nombre, $firma)){
                $consultaAnadir = "INSERT INTO jesuita VALUES (". $id.",'".$nombre."','".$firma."');";
                try {
                    $this->conexion -> query($consultaAnadir);
                    $this->resultadoAccion =  "El jesuita ha sido introducido con éxito";
                } catch (mysqli_sql_exception $e) {
                    if( $e->getCode() == 1062){
                        $this->resultadoAccion =  "Ya existe un jesuita con ese número de puesto";
                    }
                    else {
                        echo "<p>".$e->getMessage()."</p>";
                        $this->resultadoAccion = "Error inesperado, consulte con el administrador";
                    }
                }
            }
            return $this->resultadoAccion;
        }

        public function modificarFila($idOriginal, $id, $nombre, $firma){
            if($this->validar($id, $nombre, $firma)){
                $consultaModificacion = "UPDATE jesuita 
                SET idJesuita = ".$id.", nombre = '".$nombre."', firma = '".$firma."'
                WHERE idJesuita = ".$idOriginal.";";
                try {
                    $this->conexion -> query($consultaModificacion);
                    $this->resultadoAccion =  "El jesuita ha sido modificado con éxito";
                } catch (mysqli_sql_exception $e) {
                    if( $e->getCode() == 1062){
                        $this->resultadoAccion =  "Ya existe un jesuita con ese número de puesto";
                    }
                    else {
                        echo "<p>".$e->getMessage()."</p>";
                        $this->resultadoAccion = "Error inesperado, consulte con el administrador";
                    }
                }
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