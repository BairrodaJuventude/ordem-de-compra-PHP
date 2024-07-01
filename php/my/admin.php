<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['admin'])){
include('../conexao.php');
require('../menu.php');

    
$ID = $_SESSION['admin'];
$sql_usuarios = "SELECT * FROM usuarios WHERE ID = '$ID'";
$query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
$usuario = $query_usuarios->fetch_assoc();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../img/a.jpg">
    <title>Painel-ADM</title>
</head>
<body>
    <?php echo $top_adm;?>
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