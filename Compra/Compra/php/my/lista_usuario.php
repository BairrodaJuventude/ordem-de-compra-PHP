<?php
$ID =intval($_GET['ID']);

    if(!isset($_SESSION)){
        session_start();
    }
    
    if(isset($_SESSION['admin'])){
    include('../conexao.php');
    require('../menu.php');
    
    
    $sql_usuarios = "SELECT * FROM usuarios"; 
    $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
    $num_usuarios = $query_usuarios->num_rows;

    $editar = false; 
    if($editar == 1){
        $editar = "<h1>Tem certeza que deseja excluir este usuario</h1>";
    }
    if($editar){
        echo "<h1>Tem certeza que deseja excluir este usuario</h1>";
    }
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../img/a.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
    <title>Lista De Usuarios</title>
</head>
<body>
<?php echo $top_adm;?>
    <main>
    <div  class="container-fluid p-5 text-center ">
  <h1>LISTA DE USUARIOS</h1>
</div>
<div class="container mt-3">
<section  id="c">
    
       
  <table class="table">
      <tbody>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Admin</th> 
        <th>Opções</th>
      </tr>
      </tbody>
      
         
      <?php if($num_usuarios == 0){?>
        <tr>
          <td>Nenhum Usuario Cadastrado...</td>
        </tr>
        <?php }else if($num_usuarios != 0 ){
          while($usuarios =  $query_usuarios->fetch_assoc()){
            
            ?>
            
      
        <td><?php echo $usuarios['ID'];?></td> 
        <td><?php echo $usuarios['nome'];?></td>
        
        <?php if($usuarios['admin'] == 0){?>
        <td>Não</td>
        <?php }else if($usuarios['admin']==1){ ?>
        <td>Sim</td>
        <?php }?>
        <td style="text-align: center;">
          <a id="d" href="editar.php?ID=<?php echo $ID,"&idme=",$usuarios['ID'];?>">Editar</a>
          <a id="d" href="exluir.php?ID=<?php echo $ID,"&idme=",$usuarios['ID'];?>">Excluir</a>
        </td>
      </tr>
      
      <?php }
      }?>
    
      </tbody>
    </table>
    
    </section>
   
    </main>
</body>
</html>
<?php }else{
    header("Location:../logout.php");
    die();
} ?>