<?php
class downloads{
    public function descarga(string $descarga)
        {
            $archivo = './'.$descarga;
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header("Content-disposition: attachment; filename=".basename($descarga));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($descarga));
            ob_clean();
            flush();
            readfile($descarga); 
        }
}
if(isset($_GET['descarga'])){
    $archivo = './'.$_GET['descarga'];
    $download = new downloads();
    $download->descarga($archivo);
}elseif(isset($_POST['saludos'])){
    $visto = $_POST['saludos'];
    $identificador = $_POST['id'];
    $con = new mysqli("localhost","root","","RRHH");
    $sql = "UPDATE candidato
    SET visto = '".$visto."' WHERE id = ".$identificador."";
    $query = $con->query($sql);
    header('Content-type: application/json; charset=utf-8');
             echo json_encode("si", JSON_FORCE_OBJECT);  
}else if($_POST['cheque']){
    //$visto = $_POST['cheque'];
    $arrayVisto = array();
    $con = new mysqli("localhost","root","","RRHH");
    $sql = "SELECT id, visto FROM candidato";
    $query = $con->query($sql);
    while($resultado = $query->fetch_assoc())
        {
            $arrayVisto['visto'][] = $resultado; 
        }
    header('Content-type: application/json; charset=utf-8');
             echo json_encode($arrayVisto, JSON_FORCE_OBJECT); 
}