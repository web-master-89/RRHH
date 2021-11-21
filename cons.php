<?php
$con = new mysqli("localhost", "root", "", "infocus");
$sql= "SELECT * FROM users";
$query = $con->query($sql);
//var_dump($query);
$arrayCon = array();
while($resultado = $query->fetch_assoc())
{
    $arrayCon[] = $resultado;
}
//var_dump($arrayCon);
$ultimate = array("data" => $arrayCon);

    header('Content-type: application/json; charset=utf-8');
         echo json_encode($ultimate);