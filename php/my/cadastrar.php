<?php
session_start();

if (isset($_SESSION['admin'])) {
    include('../conexao.php');
    require('../menu.php');


    $mensagem_sucesso = "";
    $erro = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha_fraca = $_POST['senha'];
        $setor = $_POST['setor'];
        $token = $_POST['token'];

        $sql_setor = "SELECT * INTO setor WHERE setor = '$setor'";
        $query_setor = $mysql->query($sql_setor) or die($mysql->error);
        $num_setor = $query_setor->close();

        if (empty($nome) || empty($email) || empty($senha_fraca) || empty($setor) || empty($adm) && $num_setor!=0) {
            $erro = "Preencha todos os dados!";
        } else {

            $senha = password_hash($senha_fraca, PASSWORD_DEFAULT);

            $sql_code = "INSERT INTO usuarios (nome, email, senha, token) VALUES ('$nome', '$email', '$senha', '$token')";
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
<?php echo $top_adm; ?>
<main style="height:100vh;">
    <div class="container-fluid p-5 text-center">
        <h1>CADASTRAR NOVO USUÁRIO</h1>
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
                    <label for="email" class="form-label">E-mail:</label>
                    <input name="email" type="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input name="senha" type="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="token" class="form-label">Tipo de Usuário:</label>
                    <select name="token" class="form-select" required>
                        <option value="" selected disabled>Selecione</option>
                        <option value="1">Admin</option>
                        <option value="3">Usuario</option>
                        <option value="5">Direção</option>
                        <option value="7">Coordenador</option>
                        <option value="9">Comprador</option>
                    </select>
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