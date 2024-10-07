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
    <?php 
        include '../php/menu.php';
        echo $top;
    ?>
</nav>
<main>
    <div class="container-fluid p-5 text-center">
        <h1>Editar Usuário</h1>
    </div>
    <div class="container mt-3">
        <section id="c">
            <form method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="" required>
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