<?php
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['admin'])){
    include('../conexao.php');
    require('../menu.php');
    $idUsuario = intval($_GET['idUsu']);
    
    $sql_usuario = "SELECT * FROM usuarios WHERE ID = '$idUsuario'";
    $query_usuario = $mysql->query($sql_usuario) or die($mysql->error);
    $usuario = $query_usuario->fetch_assoc();

   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $mysql->escape_string($_POST['nome']);
        $email = $mysql->escape_string($_POST['email']);
        $senha = $mysql->escape_string($_POST['senha']);

        
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../img/a.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Editar Usuário</title>
</head>
<body>
<?php echo $top_adm;?>
<main>
    <div class="container-fluid p-5 text-center">
        <h1>Editar Usuário</h1>
    </div>
    <div class="container mt-3">
        <section id="c">
            <form method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Deixe em branco para manter a senha atual">
                </div>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                <a href="lista_usuarios.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </section>
    </div>
</main>
</body>
</html>

<?php 
} else {
    header("Location:../logout.php");
    die();
} 
?>