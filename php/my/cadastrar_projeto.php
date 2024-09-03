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

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../img/a.jpg">
    <title>Cadastrar Novo Usuário</title>
</head>
<body>
<?php echo $top; ?>
<main style="height:100vh;">
    <div class="container-fluid p-5 text-center">
        <h1>CADASTRAR NOVO PROJETO</h1>
    </div>
    </div>
    <?php if ($erro): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $erro; ?>
        </div>
    <?php endif; ?>
    <?php if ($mensagem_sucesso): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $mensagem_sucesso; ?>
        </div>
    <?php endif; ?>
    <div class="container mt-3">
        <section id="c">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input name="nome" type="text" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">Valor:</label>
                    <input name="valor" type="number" step="0.1" class="form-control" required>
                </div>

                <br>
                <button id="button" type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="lista_usuario.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </section>
    </div>
</main>
</body>
</html>
