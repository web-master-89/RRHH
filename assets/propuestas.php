<?php
require "./ayuda.php";
class propuesta extends ayuda{
    public function insert($descrion, $puesto){
        $sql = "INSERT INTO propuesta(descripcion, puesto) 
        VALUES ('".$descrion."','".$puesto."')";
        $this->conexionBd()->query($sql);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode("insercion realizada", JSON_FORCE_OBJECT);
    }
    public function selectPropuestas()
        {
            $sql = "CALL selectPropuesta()";
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
        public function deletePropuesta($idPropuesta)
          {
            $sql = "CALL deletePropuesta(".$idPropuesta.")";
            $this->conexionBd()->query($sql);
          }
}
if (isset($_POST['descripcion'])) 
{
    $descrion= $_POST['descripcion'];
    $puesto = $_POST['puesto'];
    $propuesta = new propuesta();
    $propuesta->insert($descrion, $puesto);
}elseif(isset($_GET['propuesta'])) {
    $cuadro = new propuesta();
    $cuadro->selectPropuestas();
}elseif(isset($_GET['id'])) {
    $delete = new propuesta();
    $delete->deletePropuesta($_GET['id']);
    header("location:http://localhost/login/views/propuestas.php?rol=2");
}