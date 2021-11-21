<?php
require "./ayuda.php";
class candidatos extends ayuda{
    public function insertar($nombre, $apellido, $mail, $puesto_id,
    $salario_aprox, $archivo=array(), $entrevistador_id){
    //capturamos los datos del fichero subido
    //Creamos una nueva ruta (nuevo path)
    //Así guardaremos nuestra imagen en la carpeta "images"    
    //$type = $archivo[0];
    $tmp_name = $archivo[1];
    $name = $archivo[0];
    $mime = pathinfo($name, PATHINFO_EXTENSION);
    //Movemos el archivo desde su ubicación temporal hacia la nueva ruta
    # $tmp_name: la ruta temporal del fichero
    # $nuevo_path: la nueva ruta que creamos
    if ($mime === "jpg") {
        $path = "cvs/";
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $nuevo_path="cvs/".$name;
        move_uploaded_file($tmp_name,$nuevo_path);
        $sql = "INSERT INTO candidato(nombre, apellido, mail, puesto_id,
        salario_aprox, cvpath, entrevistador_id) VALUES('".$nombre."', '".$apellido."',
        '".$mail."', ".$puesto_id.", ".$salario_aprox.",'".$nuevo_path."', ".$entrevistador_id.")";
        $query = $this->conexionBd()->query($sql); 
        return $query;         
    }else{
      //  echo "no se cargo";
    }   
    }
  
}
if(isset($_POST['nombre']) && isset($_FILES['archi']['name'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $mail = $_POST['mail'];
    $puesto = $_POST['puesto'];
    $salary = $_POST['salary'];
    $entrevistador = $_POST['entrevistador'];
    $file_path = array($_FILES['archi']['name'], $_FILES['archi']['tmp_name']);
    $candi = new candidatos();
    $candi->insertar($nombre, $apellido, $mail, $puesto, $salary, $file_path, $entrevistador);
    $datos = array(
        "inscripcion" => "Inscripción realizada",
        "personal" => "tus datos serán procesados"
    );
    header('Content-type: application/json; charset=utf-8');
             echo json_encode($datos, JSON_FORCE_OBJECT);     
}else{
    echo "loklklk";
}


