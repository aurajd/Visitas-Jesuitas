<?php
    class Jesuita{
        private $conexion;
        public $resultadoAccion = null;

        public function __construct() {
            require '../datosConexion.php';
            $this->conexion = new mysqli($servidorbd, $usuario, $contraseña, $basededatos);
            $this->conexion->set_charset("utf8");
        }

        public function leer(){
            $query = "SELECT * FROM jesuita";
            $resultado = $this->conexion->query($query);
            while($fila = $resultado->fetch_assoc()){
                $filas[] = $fila;
            }
            return $filas;
        }

        public function eliminarFila($id){
            $consultaEliminar = "DELETE FROM jesuita WHERE idJesuita = ".$id.";";
            $this->conexion->query($consultaEliminar);
            $this->resultadoAccion = "Borrado con éxito";
        }

        public function validarAnadirFila($id, $nombre, $firma){
            if(empty($id)||empty($nombre)||empty($firma)){
                $this->resultadoAccion = "Debes rellenar todos los campos.";
            }else{
                if(!is_numeric($id)){
                    $this->resultadoAccion =  "El idJesuita debe ser un número";
                }else{ 
                    $consultaAnadir = "INSERT INTO jesuita VALUES (". $id.",'".$nombre."','".$firma."');";
                    try {
                        $this->conexion -> query($consultaAnadir);
                        $this->resultadoAccion =  "El jesuita ha sido introducido con éxito";
                    } catch (mysqli_sql_exception $e) {
                        if( $e->getCode() == 1062){
                            $this->resultadoAccion =  "Ya existe un jesuita con esa id";
                        }
                    }
                }
            }
        }

        public function modificarFila($idOriginal, $id, $nombre, $firma){
            $consultaModificacion = "UPDATE jesuita 
            SET idJesuita = ".$id.", nombre = '".$nombre."', firma = '".$firma."'
            WHERE idJesuita = ".$idOriginal.";";
            $this-> conexion -> query($consultaModificacion);
            $this->resultadoAccion = "Jesuita modificado con éxito";
        }


    }
?>