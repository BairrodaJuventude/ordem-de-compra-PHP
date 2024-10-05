<?php
session_start();

if (isset($_SESSION['usuario'])) {
    include('../conexao.php');
    require('../menu.php');

//    Pega as informacoes do projeto de acordo com o identificador
$sql_usuarios = "SELECT * FROM usuarios WHERE ID = '$ID'";
$query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
$usuario = $query_usuarios->fetch_assoc();

if ($usuario['token'] != 11 || $usuario['token2'] != 11){
    header("Location: ../logout.php");
    die();
}

    $mensagem_sucesso = "";
    $erro = "";
//    Verificacao de informacoes do projeto
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $mysql->escape_string($_POST['nome']);
        $valor = $_POST['valor'];

        if($valor < 0){
            echo "Erro, Valor nao aceito";
        }

        if (empty($nome) || empty($valor) ) {
            $erro = "Preencha todos os dados!";
        } else {


//              projeto enviado para o banco de dados
            $sql_code = "INSERT INTO projetos (nome, valor) VALUES ('$nome', '$valor')";
            $deu_certo = $mysql->query($sql_code);

            if ($deu_certo) {
                $mensagem_sucesso = "Novo projeto cadastrado com sucesso!";
            } else {
                $erro = "Erro ao cadastrar o projeto!";
            }

    }
    }
} else {
    header("Location: ../logout.php");
    die();
}
?>

