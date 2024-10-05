<?php
if(!isset($_SESSION)){
    session_start();
}
//    Verifica se existe uma sessao admim ou sessao usuario
if(isset($_SESSION['usuario'])){
    include('../conexao.php');
    require('../menu.php');

    if(isset($_SESSION['usuario']))
    {
        $ID = $_SESSION['usuario'];
    }
//    Pega as informacoes do projeto de acordo com o identificador
    $sql_usuarios = "SELECT * FROM usuarios WHERE ID = '$ID'";
    $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();

    if ($usuario['token'] == 11 || $usuario['token2'] == 11){
    ?>
    

<?php
    }else{
        header("Location:../logout.php");
        die();
    }
    } else{
    header("Location:../logout.php");
    die();
}