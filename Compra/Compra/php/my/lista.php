<?php
  if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['admin'])&&(isset($_SESSION['usuario']))){
include('../conexao.php');
require('../menu.php');
    
$ID = intval($_GET['ID']);
if($ID == 63){
  $sql_usuarios ="SELECT * FROM ordens WHERE Status = 'Autorizado'";
  $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
  $num_usuarios = $query_usuarios->num_rows;
}else{
  $sql_usuarios ="SELECT * FROM ordens"; 
  $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
  $num_usuarios = $query_usuarios->num_rows;
}



?>

<?php }else{
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
    if($_SESSION['usuario']){ echo $top;}else if($_SESSION['admin']){echo $top_adm;}  
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
        
          
  <?php if($num_usuarios == 0)   {?>

      <tr>
        <td>Nenhuma Ordem Lançada...</td>
      </tr>
      
  <?php }else if($num_usuarios != 0 ){
        while($usuarios =  $query_usuarios->fetch_assoc()){
  ?>
              
      <tr>
          <td><?php echo $usuarios['ID'];?></td> 
          <td><?php echo $usuarios['fornece'];?></td> 
          <td><?php echo $usuarios['setor'];?></td>
          <td><?php echo $usuarios['Data'];?></td>
          <td><?php  echo $usuarios['Status'];?></td>
          <td><?php if($ID == 57){ ?></td>


  <?php if($usuarios['Status'] == "Em Espera"){?>
            <a id="d" href="editar.php?ID=<?php echo $ID,"&idme=",$usuarios['ID'];?>">Editar</a>
  <?php }else{}}?> 


          <a id="d" href="visualiza.php?ID=<?php echo $ID;?>&&idme=<?php echo $usuarios['ID'];?>">Detalhes</a>
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





