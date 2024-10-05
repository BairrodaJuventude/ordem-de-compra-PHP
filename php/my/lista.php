<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['admin']) || isset($_SESSION['usuario'])) {
    include('../conexao.php');
    require('../menu.php'); // Certifique-se de que o menu.php inclui o menu atualizado

    if (isset($_SESSION['admin'])) {
        $ID = $_SESSION['admin'];
    } else {
        $ID = $_SESSION['usuario'];
    }

    $sql_usuarios = "SELECT * FROM usuarios WHERE ID = '$ID'";
    $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();

    $nome = htmlspecialchars($usuario['nome']); // Protege contra XSS
    $isAdmin = ($token == 1);

//  Buscando todas as ordens de compra ja enviadas
$sql_ordensG ="SELECT * FROM ordens ";
$query_ordensG = $mysql->query($sql_ordensG) or die($mysql->error);
$ordensG = $query_ordensG->fetch_assoc();

$num_ordens = 0;
// filtro de qual usuario pode ver tal ordem ordem de compra
if (isset($_SESSION['admin']) && !isset($_SESSION['usuario'])) {

    $ID = $_SESSION['admin'];
    $sql_ordens ="SELECT * FROM ordens ORDER BY `ordens`.`Data` DESC";
    $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
    $num_ordens = $query_ordens->num_rows;

}else if (isset($_SESSION['usuario']) && !isset($_SESSION['admin'])){

    $ID = $_SESSION['usuario'];

    $sql_usuario ="SELECT * FROM usuarios WHERE ID = '$ID' ";
    $query_usuarios = $mysql->query($sql_usuario) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();

   if($usuario['token'] == 7 && $usuario['token2'] == 7){
         $sql_ordens ="SELECT * FROM ordens WHERE requisitante = $ID OR coordenador = '$ID'  AND Status = '3' OR Status = '8' AND resebido = '0' ORDER BY `ordens`.`Data` DESC";
        $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
        $num_ordens = $query_ordens->num_rows;
    }elseif( $usuario['token'] == 5 || $usuario['token2'] == 5 ){
        $sql_ordens ="SELECT * FROM ordens WHERE requisitante = $ID OR direcao = '$ID' AND Status = '4' AND resebido = '0' ORDER BY `ordens`.`Data` DESC";
        $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
        $num_ordens = $query_ordens->num_rows;

    }elseif($usuario['token'] == 13 || $usuario['token2'] == 13){

        $sql_ordens ="SELECT * FROM ordens WHERE requisitante = $ID OR Status = '5' AND resebido = '0' ORDER BY `ordens`.`Data` DESC";
        $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
        $num_ordens = $query_ordens->num_rows;
    }elseif ($usuario['token'] == 11 || $usuario['token2'] == 11){

        $sql_ordens ="SELECT * FROM ordens WHERE requisitante = $ID OR Status = '1' AND resebido = '0'  ORDER BY `ordens`.`Data` DESC";
        $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
        $num_ordens = $query_ordens->num_rows;

    }elseif($usuario['token'] == 12 || $usuario['token2'] == 12){

        $sql_ordens ="SELECT * FROM ordens WHERE requisitante = $ID OR Status = '0' OR Status = '2' OR Status = '7' AND resebido = '0' ORDER BY `ordens`.`Data` DESC";
        $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
        $num_ordens = $query_ordens->num_rows;

    }elseif ($usuario['token'] == 3 || $usuario['token2'] == 3){

        $sql_ordens ="SELECT * FROM ordens WHERE requisitante = '$ID'AND resebido = '0' ORDER BY `ordens`.`Data` DESC";
        $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
        $num_ordens = $query_ordens->num_rows;

    }
}?> 

<?php }else{
    header("Location:../logout.php");
    die();
} ?>