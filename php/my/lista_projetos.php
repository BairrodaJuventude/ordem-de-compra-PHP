<?php


if(!isset($_SESSION)){
    session_start();
}
//    verificacao de sessao admin
if(isset($_SESSION['usuario'])){
    include('../conexao.php');
    require('../menu.php');

    $ID = $_SESSION['usuario'];

    //    Pega as informacoes do projeto de acordo com o identificador
    $sql_usuarios = "SELECT * FROM usuarios WHERE ID = '$ID'";
    $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();

    if ($usuario['token'] != 11 || $usuario['token2'] != 11){
        header("Location: ../logout.php");
        die();
    }
//    consulta ao banco de dados, Para a listagem de todos projetos
    $sql_projetos = "SELECT * FROM projetos";
    $query_projetos = $mysql->query($sql_projetos) or die($mysql->error);
    $num_projetos = $query_projetos->num_rows;

    ?>

<?php }else{
    header("Location:../logout.php");
    die();
} ?>