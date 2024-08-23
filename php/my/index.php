<?php
    if(!isset($_SESSION)){
        session_start();
    }
//    Verifica se existe uma sessao admim ou sessao usuario
    if(isset($_SESSION['admin'])||(isset($_SESSION['usuario']))){
    include('../conexao.php');
    require('../menu.php');
   
    if(isset($_SESSION['admin']))
    {
        $ID = $_SESSION['admin'];
    }else {
        $ID = $_SESSION['usuario'];
    }
//    Pega as informacoes do usuario de acordo com o identificador
    $sql_usuarios = "SELECT * FROM usuarios WHERE ID = '$ID'";
    $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();

    $nome = $usuario['nome'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../img/a.jpg">
    <title>Painel</title>
</head>
<body>
<?php
        echo $top;
?>
 <main>
    <div class="dev1"><span></span></div>
    <div class="dev2">
        <h1 id="f">Bem-Vindo, <b><?php echo $nome;?></b>👋</h1>
    </div>
 </main>
 
</body>
</html>
<?php } else{
    header("Location:../logout.php");
    die();
}