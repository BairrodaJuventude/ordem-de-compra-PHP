<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logobranca.jpg">
    <link rel="stylesheet" href="../css/lateral.css">
    <script src="../javaScript/lateral.js" defer></script>

    
    <title>Configurações</title>
    
</head>
<body>
<nav class="main-menu">
    
    <?php
    session_start();
        include '../php/menu.php';
        include '../php/Configuracao/conexao.php';
        echo $top;
    ?>

</nav>
    <main style="height: 84vh;">
    <div  class="container-fluid p-5 text-center ">
  <h1>PAINEL DE CONFIGURAÇÕES</h1>
</div>
<div class="container mt-3">
<section id="c">
  <table class="table">
    <thead>
      <tr>
        <th><a id="d" href="cadastrarUser.php">Cadastrar Novo Usuario</a></th>
        <th><a id="d" href="listarUser.php">Lista De Usuarios</a></th>
          <th><a id="d" href="cadastrarSetores.php">Cadastrar Novo Setor</a></th>
        <th><a id="d" href="ordensGeral.php">Ordens de Aquisição</a></th>
        
      </tr>
     
    </table>
    </section>
    </main>
</body>
</html>