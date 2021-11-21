<?php
require "./ayuda.php";
class dashboard extends ayuda{
    public function select()
        {
            $sql = "CALL selectCandidatos()";
            $query = $this->conexionBd()->query($sql);
            $arrayCon = array();
            while($resultado = $query->fetch_assoc())
                {
                    $arrayCon[] = $resultado;
                }
            $ultimate = array("data" => $arrayCon);

            header('Content-type: application/json; charset=utf-8');
                 echo json_encode($ultimate);
        }
}
$dashboard = new dashboard();
$ver = $dashboard->select();
$ver;