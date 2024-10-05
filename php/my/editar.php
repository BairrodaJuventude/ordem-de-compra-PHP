<?php
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['admin'])){
    include('../conexao.php');
    require('../menu.php');
    $idUsuario = intval($_GET['idUsu']);
//    Busca do usuario pelo identificador
    $sql_usuario = "SELECT * FROM usuarios WHERE ID = '$idUsuario'";
    $query_usuario = $mysql->query($sql_usuario) or die($mysql->error);
    $usuario = $query_usuario->fetch_assoc();

   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $mysql->escape_string($_POST['nome']);
        $email = $mysql->escape_string($_POST['email']);
        $senha = $mysql->escape_string($_POST['senha']);

//        Updade do usuario e Criptografia de senha
        if (!empty($senha)) {
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $sql_update = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha', atualiza=NOW() WHERE ID = '$idUsuario'";
        } else {
            $sql_update = "UPDATE usuarios SET nome='$nome', email='$email', atualiza=NOW() WHERE ID = $idUsuario";
        }

        if ($mysql->query($sql_update)) {
            echo "<script>alert('Usuário atualizado com sucesso!'); window.location.href='lista_usuario.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar usuário');</script>";
        }
    }
?>



<?php 
} else {
    header("Location:../logout.php");
    die();
} 
?>