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
    <link rel="icon" href="../../img/a.jpg">

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/lateral.css">
    <script src="../../javaScript/lateral.js" defer></script>

    <title>Home</title>
 
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



<main>
    <div class="dev1"><span></span></div>
    <div class="dev2">
        <h1 id="f">Bem-Vindo, <b><?php echo $nome; ?></b>👋</h1>
    </div>
</main>

</body>
</html>



<?php 
} else {
    header("Location: ../logout.php");
    die();
}
?>
