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

    <title>Cadastrar Novo Setor</title>
    
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
        <h1>CADASTRAR NOVO SETOR</h1>
    </div>
    </div>
                    
                    
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