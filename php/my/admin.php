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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/lateral.css">
    <script src="../../javaScript/lateral.js" defer></script>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../img/a.jpg">
    <title>Painel-ADM</title>
</head>
<body>
<nav>
    <div class="main-menu">
    <?php echo $top; ?>
</div>

<div class="sidebar">
    <p onclick="toggleDropdown()"><?php echo $nome; ?> ↓  </p>
    
    <ul id="user-menu" class="dropdown">
        <?php if ($token == 11 || $token2 == 11) { ?>
            <li><a href="projetos.php">Projetos</a></li>
        <?php } ?>
        <?php if ($isAdmin) { ?>
            <li><a href="admin.php">Configurações</a>
        <?php } ?>
        <a href="../logout.php">Logout</a></li>
    </ul>
</div>

</nav>
    <main style="height: 84vh;">
    <div  class="container-fluid p-5 text-center ">
  <h1>FUNÇÕES DO ADM</h1>
</div>
<div class="container mt-3">
<section id="c">
  <table class="table">
    <thead>
      <tr>
        <th><a id="d" href="cadastrar.php">Cadastrar Novo Usuario</a></th>
        <th><a id="d" href="lista_usuario.php">Lista De Usuarios</a></th>
          <th><a id="d" href="cadastrar_setor.php">Cadastrar Novo Setor</a></th>
        <th><a id="d" href="lista.php">Lista De Ordens</a></th>
        
      </tr>
     
    </table>
    </section>
    </main>
</body>
</html>



<?php }else{
    header("Location:../logout.php");
    die();
}