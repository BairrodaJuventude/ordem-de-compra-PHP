<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['admin']) || isset($_SESSION['usuario'])) {
    include('../conexao.php');
    include('../Usuario/Usuarios.php');
    require('../menu.php'); // Certifique-se de que o menu.php inclui o menu atualizado

    if (isset($_SESSION['admin'])) {
        $ID = $_SESSION['admin'];
    } else {
        $ID = $_SESSION['usuario'];
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
    <link rel="stylesheet" href="../../css/lateral.css">
    <script src="../../javaScript/lateral.js" defer></script>
    <title>Lista De Usuarios</title>
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
            $usuarios = listarUsuarios();
//          Listagem de todos usuarios cadastrados
          for($i = 0;$i < $quantUsuario; $i++){
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
         <?php }else if((($usuarios['token'] == 5) && ($usuarios['token2'] == 7) || ($usuarios['token'] == 7) && ($usuarios['token2'] == 5))){?>
           <td>Coordenador E Direção</td>
         <?php }else if((($usuarios['token'] == 1) && ($usuarios['token2'] == 7) || ($usuarios['token'] == 7) && ($usuarios['token2'] == 1))){?>
           <td>Coordenador E ADM</td>
         <?php }else if((($usuarios['token'] == 1) && ($usuarios['token2'] == 5) || ($usuarios['token'] == 5) && ($usuarios['token2'] == 1))){?>
           <td>Direção E ADM</td>
         <?php }else if((($usuarios['token'] == 12) && ($usuarios['token2'] == 7) || ($usuarios['token'] == 7) && ($usuarios['token2'] == 12))){?>
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
      ?>
    
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