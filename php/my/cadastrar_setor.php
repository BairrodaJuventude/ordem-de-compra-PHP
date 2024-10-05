<?php
if (!isset($_SESSION)){
session_start();
}
if (isset($_SESSION['admin'])) {
    include('../conexao.php');
    require('../menu.php');
    $mensagem_sucesso = "";
    $erro = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomeSetor = $mysql->escape_string($_POST['nome']);

        if (empty($nomeSetor)){
            $erro = "Preencha todos os dados!";
        } else {
            $sql_code = "INSERT INTO setores (setor) VALUES ('$nomeSetor')";
            $deu_certo = $mysql->query($sql_code);

            if ($deu_certo) {
                $mensagem_sucesso = "Novo Setor cadastrado com sucesso!";
            } else {
                $erro = "Erro ao cadastrar o Setor!";
            }
        }
    }
?>


<?php }else{
    header("Location: ../logout.php");
    die();
} ?>