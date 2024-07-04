<?php
  if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['admin'])||(isset($_SESSION['usuario']))){
include('../conexao.php');
require('../menu.php');

$sql_ordensG ="SELECT * FROM ordens ";
$query_ordensG = $mysql->query($sql_ordensG) or die($mysql->error);
$ordensG = $query_ordensG->fetch_assoc();

if (isset($_SESSION['admin']) && !isset($_SESSION['usuario'])) {

    $ID = $_SESSION['admin'];
    $sql_ordens ="SELECT * FROM ordens ";
    $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
    $num_ordens = $query_ordens->num_rows;

}else if (isset($_SESSION['usuario']) && !isset($_SESSION['admin'])){

    $ID = $_SESSION['usuario'];
    $sql_usuario ="SELECT * FROM usuarios WHERE ID = '$ID'";
    $query_usuarios = $mysql->query($sql_usuario) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();
    if (($usuario['token'] == 7 || $usuario['token2'] == 7) && $ordensG['estado']== '0'){

        $sql_ordens ="SELECT * FROM ordens WHERE coordenador = '$ID'";
        $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
        $num_ordens = $query_ordens->num_rows;
    }else if(($usuario['token'] == 5 || $usuario['token2'] == 5)&& $ordensG['estado']=='1'){

         $sql_ordens ="SELECT * FROM ordens WHERE direcao = '$ID'";
        $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
        $num_ordens = $query_ordens->num_rows;
    }else if(($usuario['token'] == 9 || $usuario['token2'] == 9)&&$ordensG['estado']=='2'){

        $sql_ordens ="SELECT * FROM ordens WHERE direcao != '0'";
        $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
        $num_ordens = $query_ordens->num_rows;
    }
}?>
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
               <?php if(isset($_SESSION['admin']) && !isset($_SESSION['usuario'])){?> <th>ID</th> <?php }?>
                <th>Fornecedor</th>
                <th>Setor</th>
                <th>Data</th>
                <th>Status</th>
                <th>Detalhes</th>
              </tr>
          </tbody>
        
          
  <?php if($num_ordens == 0)   {

      ?>

      <tr>
        <td>Nenhuma Ordem Lançada...</td>
      </tr>
      
  <?php }else{
        while($ordem = $query_ordens->fetch_assoc()){
            $data = date_create($ordem['Data']);
            $id_setor = $ordem['setor'];
            $sql_setor ="SELECT * FROM setores WHERE id_setor = '$id_setor' ";
            $query_setor = $mysql->query($sql_setor) or die($mysql->error);
            $setores = $query_setor->fetch_assoc();


            ?>
              
      <tr>
            <?php if(isset($_SESSION['admin']) && !isset($_SESSION['usuario'])){?>
                <td><?php echo $ordem['ID'];?></td>
            <?php }?>
          <td><?php echo $ordem['fornece'];?></td>
          <td>
              <?php
              echo $ordem['setor'];

              ?>
          </td>
          <td><?php echo date_format($data, "d/M/y");?></td>
          <td>
              <?php
                if($ordem['Status'] == 0){
                  echo"Em espera Coordenador";
                } else if($ordem['Status'] == 1){
                  echo"Autorizado Pelo Coordenador, Em Espera Do(a) Diretor";
                }else if ($ordem['Status'] == 2){
                    echo"Rejeitado Pelo Coordenador";
                } else if($ordem['Status'] == 3){
                    echo"Autorizado Pelo Diretor, Em Espera Da Compra";
                }else if($ordem['Status'] == 4){
                    echo "Finalizado.";
                }
              ?>
          </td>



  <?php if($ordem['Status'] == "Em Espera"){?>
            <a id="d" href="editar.php?idme=",<?php $ordem['ID'];?>">Editar</a>

  <?php }else{?>
          <td><a id="d" href="visualiza.php?idme=<?php echo $ordem['ID'];?>">Detalhes</a></td>
        </tr>
        
        <?php }}
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
<?php }else{
    header("Location:../logout.php");
    die();
} ?>