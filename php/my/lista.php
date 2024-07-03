<?php
  if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['admin'])||(isset($_SESSION['usuario']))){
include('../conexao.php');
require('../menu.php');

if (isset($_SESSION['admin']))
{
    $ID = $_SESSION['admin'];
}else if (isset($_SESSION['usuario'])){
    $ID = $_SESSION['usuario'];
}
  $sql_ordens ="SELECT * FROM ordens WHERE requisitante = "$ID" ";
  $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
  $num_ordens = $query_ordens->num_rows;
}else{
    header("Location:../logout.php");
    die();
} ?>


                                              <!Fim do PHP!>


                                              <!Inicio do HTML!>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../img/a.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
    <title>Lista De Ordens</title>
</head>
<body>
  <?php 
    if(isset($_SESSION['usuario'])) {
        echo $top;
    }else if(isset($_SESSION['admin'])){
        echo $top_adm;
    }
  ?>
    <main>
      <div  class="container-fluid p-5 text-center ">
              <h1>ORDENS ENVIADAS</h1>
      </div>

<div class="container mt-3">
  <div class="row">
      <section id="c"> 
        <table class="table">
          <tbody>
            <thead>
              <tr>
                <th>ID</th>
                <th>Fornecedor</th>
                <th>Setor</th>
                <th>Data</th>
                <th>Status</th>
                <th>Detalhes</th>
              </tr>
          </tbody>
        
          
  <?php if($num_ordens == 0)   {?>

      <tr>
        <td>Nenhuma Ordem Lançada...</td>
      </tr>
      
  <?php }else if($num_ordens != 0){
        while($ordem =  $query_ordens->fetch_assoc()){
  ?>
              
      <tr>
          <td><?php echo $ordem['ID'];?></td> 
          <td><?php echo $ordem['fornece'];?></td> 
          <td><?php echo $ordem['setor'];?></td>
          <td><?php echo $ordem['Data'];?></td>
          <td><?php  echo $ordem['Status'];?></td>
          <td><?php if(){ ?></td>


  <?php if($ordem['Status'] == "Em Espera"){?>
            <a id="d" href="editar.php?idme=",<?php $ordem['ID'];?>">Editar</a>
  <?php }else{}}?> 


          <a id="d" href="visualiza.php?idme=<?php echo $ordem['ID'];?>">Detalhes</a>
          </td>
        </tr>
        
        <?php }
        }?>
      
          </tbody>
        </table>
      
      </section>

    <div  class="container-fluid p-5 text-center ">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <a href="index.php" class="btn btn-primary btn-lg">Voltar</a>
          </div>

    </div>
    </main>


</body>
</html>

                                              <!Fim do HTML!>
