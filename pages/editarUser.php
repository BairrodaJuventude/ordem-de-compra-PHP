<?php

    session_start();

    include '../php/Configuracao/conexao.php';
    require_once '../php/Usuario/ServiceUsuarios.php';

    session_start();

    verificaAdmin();

    if (!isset($_GET['id'])){
        die("Identificador Não Encontrado");
    }
        $usuario = new usuarios(pegaIdCriptUsuario($_GET['id']), false);



    if (count($_POST)>0)
    {
        echo editarUsuario($usuario->SelecionaUsuario()[0]['ID'], $_POST['nome'], $_POST['email'], $_POST['senha'],$_POST['token']);

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logobranca.jpg">


    <script src="../javaScript/lateral.js" defer></script>
    <script src="../javaScript/mobile-navbar.js"></script>


    <title>Editar Usuário</title>

</head>
<body>
<nav class="main-menu">
<!--    --><?php //
//        include '../php/menu.php';
//        echo $top;
//    ?>
</nav>
<main>
    <div class="container-fluid p-5 text-center">
        <h1>Editar Usuário <?php echo $usuario->SelecionaUsuario()[0]['nome']; ?></h1>
    </div>
    <div class="container mt-3">
        <section id="c">
            <form method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuario->SelecionaUsuario()[0]['nome']?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario->SelecionaUsuario()[0]['email']?>" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Deixe em branco para manter a senha atual">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Tipo</label>
                   <select class="form-control" id="senha" name="token" required>

                       <option value="" selected disabled>Selecione</option>
                       <option value="1">Admin</option>
                       <option value="3">Usuario</option>
                       <option value="5">Direção</option>
                       <option value="7">Coordenador</option>
                       <option value="11">Projetos</option>
                       <option value="12">Compras</option>
                       <option value="13">Almoxarifado</option>

                   </select>
                </div>

                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                <a href="lista_usuarios.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </section>
    </div>
</main>
</body>
</html>