<?php


    if(!isset($_SESSION)){
        session_start();
    }
//    verificacao de sessao admin
    if(isset($_SESSION['admin'])){
    include('../conexao.php');
    require('../menu.php');

    $ID = $_SESSION['admin'];
//    consulta ao banco de dados, Para a listagem de todos usuarios
    $sql_usuarios = "SELECT * FROM usuarios"; 
    $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
    $num_usuarios = $query_usuarios->num_rows;

//    verificacao de edicao/desativacao de usuario
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
<?php echo $top;?>
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
        <th>Email</th>
        <th>Tipo De Usuario</th>
        <th>Data De Cadastro</th>
        <th>Data De Update</th>
        <th>Status</th>
        <th>Opções</th>
      </tr>
      </tbody>
      <?php
//      Verificacao se ha algum usuario no banco
      if($num_usuarios == 0){?>
        <tr>
          <td>Nenhum Usuario Cadastrado...</td>
        </tr>
        <?php }else if($num_usuarios != 0 ){
//          Listagem de todos usuarios cadastrados
          while($usuarios =  $query_usuarios->fetch_assoc()){
            $dataCadastro = date_create($usuarios['cadastro']);
            ?>
            
      
        <td><?php echo $usuarios['ID'];?></td> 
        <td><?php echo $usuarios['nome'];?></td>
        <td><?php echo $usuarios['email'];?></td>

       <?php  if($usuarios['token'] == 1 && $usuarios['token2'] == 1){ ?>
        <td>ADM</td>
        <?php }else if($usuarios['token'] == 3 && $usuarios['token2'] == 3){?>
         <td>Usuario</td>
         <?php }else if($usuarios['token'] == 5 && $usuarios['token2'] == 5){?>
         <td>Aprovador</td>
         <?php }else if($usuarios['token']  == 7 && $usuarios['token2'] == 7){?>
         <td>Coordenador</td>
         <?php }else if($usuarios['token'] && $usuarios['token2'] == 12){?>
         <td>Compras</td>
         <?php }else if($usuarios['token'] && $usuarios['token2'] == 11){?>
         <td>Projetos</td>
         <?php }else if($usuarios['token'] && $usuarios['token2'] == 13){?>
         <td>Almoxarifado</td>
         <?php }else if((($usuarios['token'] == 5) && ($usuarios['token2'] == 7)
                    || ($usuarios['token'] == 7) && ($usuarios['token2'] == 5))){?>
           <td>Coordenador E Direção</td>
         <?php }else if((($usuarios['token'] == 1) && ($usuarios['token2'] == 7)
                    || ($usuarios['token'] == 7) && ($usuarios['token2'] == 1))){?>
           <td>Coordenador E ADM</td>
         <?php }else if((($usuarios['token'] == 1) && ($usuarios['token2'] == 5)
                    || ($usuarios['token'] == 5) && ($usuarios['token2'] == 1))){?>
           <td>Direção E ADM</td>
         <?php }else if((($usuarios['token'] == 12) && ($usuarios['token2'] == 7)
                  || ($usuarios['token'] == 7) && ($usuarios['token2'] == 12))){?>
                  <td>Coordenador E Comprador</td>
              <?php }?>
         <td>
             <?php echo date_format($dataCadastro, "d/m/Y H:i:s") ?>
         </td>
         <?php if($usuarios['atualiza'] == "0000-00-00 00:00:00"){?>
            <td>Este Usuario Nunca Foi Atualizado</td>
         <?php }else{ $dataUpdate = date_create($usuarios['atualiza'])?>
            <td><?php echo date_format($dataUpdate, "d/m/Y H:i:s")?></td>
         <?php }?>

              <td>
                  <?php if($usuarios['Status']== 1){
                  echo "Ativo";
                  }else{
                      echo "Desativado";
                  } ?>
              </td>
        <td style="text-align: center;">
          <a id="d" href="editar.php?idUsu=<?php echo $usuarios['ID'];?>">Editar</a>
           <?php if ($usuarios['Status']== 1){ ?>
                <a id="d" href="Status.php?idUsu=<?php echo $usuarios['ID'];?>">Desativar</a>
          <?php }else{?>
               <a id="d" href="Status.php?idUsu=<?php echo $usuarios['ID'];?>">Ativar</a>
         <?php }?>

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