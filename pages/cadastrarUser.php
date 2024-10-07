<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logobranca.jpg">


    <script src="../javaScript/lateral.js" defer></script>
    <script src="../javaScript/mobile-navbar.js"></script>


    <title>Cadastrar Novo Usuário</title>
    
</head>
<body>
<nav class="main-menu">
    <?php 
        include '../php/menu.php';
        echo $top;
    ?>
</nav>
<main style="height:100vh;">
    <div class="container-fluid p-5 text-center">
        <h1>CADASTRAR NOVO USUÁRIO</h1>
    </div>
    </div>
                    
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
                        <option value="11">Projetos</option>
                        <option value="12">Compras</option>
                        <option value="13">Almoxarifado</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="token2" class="form-label">Tipo de Usuário:</label>
                    <select name="token2" class="form-select" required>
                        <option value="" selected disabled>Selecione</option>
                        <option value="1">Admin</option>
                        <option value="3">Usuario</option>
                        <option value="5">Aprovador</option>
                        <option value="7">Coordenador</option>
                        <option value="11">Projetos</option>
                        <option value="12">Compras</option>
                        <option value="13">Almoxarifado</option>
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