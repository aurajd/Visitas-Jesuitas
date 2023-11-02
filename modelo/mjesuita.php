<?php
    require_once "conectar.php";
    class MJesuita extends Conectar{
        public $resultadoAccion = null;

        public function __construct() {
            parent::__construct();
        }

        public function consultaIndividual($id){
            $query = "SELECT * FROM jesuita where idJesuita = '".$id."';";
            $resultado = $this->conexion->query($query);
            if($resultado->num_rows==0){
                $this->resultadoAccion =  "El número de puesto no corresponde con ningún jesuita";
                return false;
            }
            $jesuita = $resultado->fetch_assoc();
            return $jesuita;
        }



        public function anadirFila($id, $nombre, $firma){
            $consultaAnadir = "INSERT INTO jesuita VALUES (". $id.",'".$nombre."','".$firma."');";
            try {
                $this->conexion -> query($consultaAnadir);
                $this->resultadoAccion =  "El jesuita ha sido introducido con éxito";
            } catch (mysqli_sql_exception $e) {
                if( $e->getCode() == 1062){
                    $this->resultadoAccion =  "Ya existe un jesuita con ese número de puesto";
                }
                else {
                    $this->resultadoAccion = "Error inesperado, consulte con el administrador";
                }
            }
            return $this->resultadoAccion;
        }
        public function eliminarFila($id){
            $consultaEliminar = "DELETE FROM jesuita WHERE idJesuita = ".$id.";";
            try{
                $this->conexion->query($consultaEliminar);
                $this->resultadoAccion = "Borrado con éxito";
            }catch (mysqli_sql_exception $e){
                if( $e->getCode() == 1451){
                    $this->resultadoAccion = "El lugar tiene visitas realizadas, no se puede eliminar";
                }
                else {
                    $this->resultadoAccion = "Error inesperado, consulte con el administrador";
                }
            }
            return $this->resultadoAccion;
        }
        public function modificarFila($idOriginal, $id, $nombre, $firma){
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
                else if( $e->getCode() == 1451){
                    $this->resultadoAccion = "El lugar tiene visitas realizadas, no se puede modificar";
                }
                else {
                    $this->resultadoAccion = "Error inesperado, consulte con el administrador";
                }
            }
            return $this->resultadoAccion;
        }



    }
?>