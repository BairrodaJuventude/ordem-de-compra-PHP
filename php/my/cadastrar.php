<?php
session_start();

if (isset($_SESSION['admin'])) {
    include('../conexao.php');
    require('../menu.php');


    $mensagem_sucesso = "";
    $erro = "";
//    Verificacao de credenciais de usuario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $mysql->escape_string($_POST['nome']);
        $email = $mysql->escape_string($_POST['email']);
        $senha_fraca = $_POST['senha'];
        $token = $_POST['token'];
        $token2 = $_POST['token2'];

        if (empty($nome) || empty($email) || empty($senha_fraca) || empty($token) || empty($token2)) {
            $erro = "Preencha todos os dados!";
        } else {

            $senha = password_hash($senha_fraca, PASSWORD_DEFAULT);
//              Usuario enviado para o banco de dados
            $sql_code = "INSERT INTO usuarios (nome, email, senha, atualiza, token, token2, Status) VALUES ('$nome', '$email', '$senha', '0000-00-00 00:00:00' , '$token', '$token2', '1')";
            $deu_certo = $mysql->query($sql_code);

            if ($deu_certo) {
                $mensagem_sucesso = "Novo usuário cadastrado com sucesso!";
            } else {
                $erro = "Erro ao cadastrar o usuário!";
            }
        }
    }
} else {
    header("Location: ../logout.php");
    die();
}
?>

