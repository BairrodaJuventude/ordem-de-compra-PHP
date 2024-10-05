<?php
  if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['admin'])||(isset($_SESSION['usuario']))){
include('../conexao.php');
require('../menu.php');

if (isset($_SESSION['admin'])){
    $ID = $_SESSION['admin'];
}else{
    $ID = $_SESSION['usuario'];
}

 $sql_usuarios = "SELECT * FROM usuarios WHERE ID = '$ID'";
 $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
 $usuario = $query_usuarios->fetch_assoc();


 if ($usuario['token'] == 13 || $usuario['token2'] == 13){
      $sql_ordens ="SELECT * FROM ordens WHERE histAlm = 1 AND requisitante = $ID";
 }
 if($usuario['token']  == 12 || $usuario['token2'] == 12){
    $sql_ordens ="SELECT * FROM ordens WHERE histCom = 1 AND requisitante = $ID";
 }
 if ($usuario['token'] == 11 || $usuario['token2'] == 11){
      $sql_ordens ="SELECT * FROM ordens WHERE histPro = 1 AND requisitante = $ID";
 }
 if ($usuario['token'] == 7 || $usuario['token2'] == 7){
      $sql_ordens ="SELECT * FROM ordens WHERE histCoo = 1 AND requisitante = $ID";
 }
 if ($usuario['token'] == 5 || $usuario['token2'] == 5){
      $sql_ordens ="SELECT * FROM ordens WHERE histDir = 1 AND requisitante = $ID";
 }
 if ($usuario['token'] == 3 || $usuario['token2'] == 3){
      $sql_ordens ="SELECT * FROM ordens WHERE histUsu = 1 AND requisitante = $ID";
 }
 if ($usuario['token'] == 1 || $usuario['token2'] == 1){
     $sql_ordens ="SELECT * FROM ordens WHERE histAdm = 1 AND requisitante = $ID";
 }
   $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
    $num_ordens = $query_ordens->num_rows;


?>
 
<?php }else{
    header("Location:../logout.php");
    die();
} ?>