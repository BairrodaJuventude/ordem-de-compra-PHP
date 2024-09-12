<?php 

$host = "localhost";
$db = "Compras";
$user = "root";
$pass = "";

$mysql = new  mysqli($host, $user, $pass, $db);
if($mysql->connect_error){
    echo "falha ao conectar:(" . $mysql->connect_error . ")" . $mysql->connect_error ;
}
//$mysqla = new  mysqli($host, $user, $pass, $db);
//if($mysqla->connect_error){
//    echo "falha ao conectar:(" . $mysqla->connect_error . ")" . $mysqla->connect_error ;
//}
?>
