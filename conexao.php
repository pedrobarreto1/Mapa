<?php

$host = "localhost";
$user = "id18950456_dandxs";
$pass = "Teste789@Mapa";
$dbname = "id18950456_usuarios";

try{
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
}catch(PDOException $err){
 
}