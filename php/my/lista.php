<?php
  if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['admin'])||(isset($_SESSION['usuario']))){
include('../conexao.php');
require('../menu.php');
//  Buscando todas as ordens de compra ja enviadas
$sql_ordensG ="SELECT * FROM ordens ";
$query_ordensG = $mysql->query($sql_ordensG) or die($mysql->error);
$ordensG = $query_ordensG->fetch_assoc();

$num_ordens = 0;
// filtro de qual usuario pode ver tal ordem ordem de compra
if (isset($_SESSION['admin']) && !isset($_SESSION['usuario'])) {

    $ID = $_SESSION['admin'];
    $sql_ordens ="SELECT * FROM ordens ORDER BY `ordens`.`Data` DESC";
    $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
    $num_ordens = $query_ordens->num_rows;

}else if (isset($_SESSION['usuario']) && !isset($_SESSION['admin'])){

    $ID = $_SESSION['usuario'];

    $sql_usuario ="SELECT * FROM usuarios WHERE ID = '$ID' ";
    $query_usuarios = $mysql->query($sql_usuario) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();

   if($usuario['token'] == 7 && $usuario['token2'] == 7){
         $sql_ordens ="SELECT * FROM ordens WHERE requisitante = $ID OR coordenador = '$ID' AND resebido = '0' AND Status = '3' OR Status = '8' ORDER BY `ordens`.`Data` DESC";
        $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
        $num_ordens = $query_ordens->num_rows;
    }elseif( $usuario['token'] == 5 || $usuario['token2'] == 5 ){
        $sql_ordens ="SELECT * FROM ordens WHERE requisitante = $ID OR direcao = '$ID' AND Status = '4' AND resebido = '0' ORDER BY `ordens`.`Data` DESC";
        $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
        $num_ordens = $query_ordens->num_rows;

    }elseif($usuario['token'] == 13 || $usuario['token2'] == 13){

        $sql_ordens ="SELECT * FROM ordens WHERE requisitante = $ID OR Status = '5' AND resebido = '0' ORDER BY `ordens`.`Data` DESC";
        $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
        $num_ordens = $query_ordens->num_rows;
    }elseif ($usuario['token'] == 11 || $usuario['token2'] == 11){

        $sql_ordens ="SELECT * FROM ordens WHERE requisitante = $ID OR Status = '1' AND resebido = '0'  ORDER BY `ordens`.`Data` DESC";
        $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
        $num_ordens = $query_ordens->num_rows;

    }elseif($usuario['token'] == 12 || $usuario['token2'] == 12){

        $sql_ordens ="SELECT * FROM ordens WHERE requisitante = $ID OR Status = '0' OR Status = '2' OR Status = '7' AND resebido = '0' ORDER BY `ordens`.`Data` DESC";
        $query_ordens = $mysql->query($sql_ordens) or die($mysql->error);
        $num_ordens = $query_ordens->num_rows;

    }elseif ($usuario['token'] == 3 || $usuario['token2'] == 3){

        $sql_ordens ="SELECT * FROM ordens WHERE requisitante = '$ID'AND resebido = '0' ORDER BY `ordens`.`Data` DESC";
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
        echo $top;
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
  <?php if($num_ordens == 0){?>

      <tr>
        <td>Nenhuma Ordem Lançada...</td>
      </tr>

  <?php }else{
        while($ordem = $query_ordens->fetch_assoc() ){
            $data = date_create($ordem['Data']);



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
                  echo"Em Espera Da Aprovação";
                } else if($ordem['Status'] == 1){
                  echo"Em Espera Da Aprovação";
                }else if ($ordem['Status'] == 2){
                    echo"Em Espera Da Aprovação";
                } else if($ordem['Status'] == 3){
                    echo"Em Espera Da Aprovação";
                }else if($ordem['Status'] == 4){
                    echo "Em Espera Da Aprovação";
                }else if($ordem['Status'] == 5){
                    echo "Aprovada";
                }else if($ordem['Status'] == 7){
                    echo "Não ha Projeto";
                }
              ?>
          </td>



<!--  --><?php //if($ordem['Status'] == 2 ){?>
<!--            <td><a id="d" href="editar_ordem.php?idme=--><?php //echo $ordem['ID'];?><!--">Editar</a></td>-->
<!---->
<!---->
<!--  --><?php //}else{?>
          <td><a id="d" href="visualiza.php?idme=<?php echo $ordem['ID'];?>">Detalhes</a></td>
        </tr>
        
        <?php //}
        }
        }?>
      
          </tbody>
        </table>
      
      </section>

    <div  class="container-fluid p-5 text-center ">
      <div class="row justify-content-center">
        <div class="col-md-4">

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