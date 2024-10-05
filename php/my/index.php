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
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../img/a.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/lateral.css">
    <script src="../../javaScript/lateral.js" defer></script>

    <title>Home</title>
 
</head>
<body>
<nav>
    <class class="main-menu">
    <?php echo $top; ?>
    </class>

    <?php echo $nome; ?>
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
