<?php
require_once "conectar.php";
class MVisita extends Conectar{
    public $resultadoAccion = null;

    public function __construct() {
        parent::__construct();
    }

    public function leer(){
        $query = "SELECT * FROM visita 
                ORDER BY fechaHora DESC
                LIMIT 5";
        $resultado = $this->conexion->query($query);
        while($fila = $resultado->fetch_assoc()){
            $filas[] = $fila;
        }
        return $filas;
    }

    public function consultaColumnaOrdenada($columna, $tabla){
        $query = "SELECT $columna FROM $tabla order by $columna";
        $resultado = $this->conexion->query($query);
        while($fila = $resultado->fetch_assoc()){
            $nombres[] = $fila["$columna"];
        }
        return $nombres;
    }

    public function comprobarJesuita($nombre,$firma){
        $query = "select idJesuita from jesuita where nombre='".$nombre."' and firma='".$firma."';";
        $idJesuita = $this->conexion->query($query);
        if($this->conexion->affected_rows >0){
            return true;
        }
        return false;
    }
}
?>