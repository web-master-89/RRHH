<?php
class ayuda{
    public $conexion;
    function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "RRHH");
    }
    public function conexionBd(){
        return $this->conexion;
    }
}
