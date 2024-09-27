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

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/lateral.css">
    <script src="../../javaScript/lateral.js" defer></script>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../img/a.jpg">
    <title>Cadastrar Novo Setor</title>
</head>
<body>

<nav>
    <class class="main-menu">
    <?php echo $top; ?>
    </class>

    <?php echo $nome; ?>
    </div>

</nav>

<main style="height:100vh;">
    <div class="container-fluid p-5 text-center">
        <h1>CADASTRAR NOVO SETOR</h1>
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
                <br>
                <button id="button" type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="admin.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </section>
    </div>
</main>
</body>
</html>
<?php }else{
    header("Location: ../logout.php");
    die();
} ?>