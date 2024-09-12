<?php
//  Muda o Status do Usuario se ele esta desativado ou ativado
include "../conexao.php";
$id_usuario = intval($_GET['idUsu']);
$sql_usuarios = "SELECT * FROM usuarios where ID = '$id_usuario'";
$query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
$usuarios = $query_usuarios->fetch_assoc();

if ($usuarios['Status'] == 1) {
    $sql_Status = "UPDATE `usuarios` SET Status ='0' WHERE ID = '$id_usuario'";
    $query_Status= $mysql->query($sql_Status) or die($mysql->error);

}else if ($usuarios['Status'] == 0){
    $sql_Status = "UPDATE `usuarios` SET Status ='1' WHERE ID = '$id_usuario'";
    $query_Status= $mysql->query($sql_Status) or die($mysql->error);
}
header("Location: lista_usuario.php");
die();