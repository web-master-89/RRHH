<?php
require "./config.php";
if (isset($_POST["mail"]) && isset($_POST["password"])) {
    $email = $_POST["mail"];
    $password = $_POST["password"];
    $sql= "SELECT * FROM users WHERE mail = '".$email."'";
    $consulta = $con->query($sql);
    $clave;
    $rol;
    $nombre;
    $apellido;
    $userId;
    $correo;
    while($resultado = $consulta->fetch_assoc())
    {
        $clave =  $resultado["clave"];
        $rol = $resultado["rol_id"];
        $nombre = $resultado["nombre"];
        $apellido = $resultado["apellido"]; 
        $userId = $resultado["id"];
        $correo = $resultado["mail"];
    }
    //var_dump(password_verify($password, $clave));
    $arrayCon = array();
    if($email === $correo && 
    password_verify($password, $clave)) 
    {
        $arrayCon["logueado"] = $rol;
        session_start();
        $_SESSION["user_id"] = $userId;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["apellido"] = $apellido;
        $_SESSION["rol"] = $rol;
        $arg = date_default_timezone_set('America/Argentina/Buenos_Aires');
        $datetime = new DateTime();
        $fecha = $datetime->format('Y-m-d');
        $hora = $datetime->format('h:m:i');
        $_SESSION["fecha"] = $fecha;
        $_SESSION["hora"] = $hora;
        $sqlint = "INSERT INTO login(users_id, hora, fecha) 
        VALUES('".$_SESSION["user_id"]."', '".$_SESSION["hora"]."', '".$_SESSION["fecha"]."')";
        $con->query($sqlint);
        header('Content-type: application/json; charset=utf-8');
             echo json_encode($arrayCon, JSON_FORCE_OBJECT);
    }else{
        $arrayCon["logueado"] = "no";
        header('Content-type: application/json; charset=utf-8');
             echo json_encode($arrayCon, JSON_FORCE_OBJECT); 
    }
    
}else{ 
   echo "mal";
}


 