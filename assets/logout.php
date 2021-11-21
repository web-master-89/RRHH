<?php
class cierre{
    public function log_out(){
        require "./config.php";
        session_start();
        $datetime = new DateTime();
        $fecha = $datetime->format('Y-m-d');
        echo $fecha;
        $hora = $datetime->format('h:m:i');
        $sql = "INSERT INTO logout(users_id, hora, fecha) VALUES(".$_SESSION["user_id"].", '".$hora."', '".$fecha."')";
        $con->query($sql);
        session_destroy();
        $_SESSION["user_id"] ;
        $_SESSION["nombre"] ;
        $_SESSION["apellido"] ;
        $_SESSION["fecha"] ;
        $_SESSION["hora"] ;
        header("location:../index.html");
    }
}
$cierre = new cierre();
$cierre->log_out();



