<?php


    if(!isset($_SESSION)){
        session_start();
    }
//    verificacao de sessao admin
    if(isset($_SESSION['admin'])){
    include('../conexao.php');
    require('../menu.php');

    $ID = $_SESSION['admin'];
//    consulta ao banco de dados, Para a listagem de todos usuarios
    $sql_usuarios = "SELECT * FROM usuarios"; 
    $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
    $num_usuarios = $query_usuarios->num_rows;

//    verificacao de edicao/desativacao de usuario
    $editar = false; 
    if($editar == 1){
        $editar = "<h1>Tem certeza que deseja excluir este usuario</h1>";
    }
    if($editar){
        echo "<h1>Tem certeza que deseja excluir este usuario</h1>";
    }
    ?>
   
<?php }else{
    header("Location:../logout.php");
    die();
} ?>