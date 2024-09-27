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

    $nome = htmlspecialchars($usuario['nome']); // Protege contra XSS
    $isAdmin = ($token == 1);

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
         $sql_ordens ="SELECT * FROM ordens WHERE requisitante = $ID OR coordenador = '$ID'  AND Status = '3' OR Status = '8' AND resebido = '0' ORDER BY `ordens`.`Data` DESC";
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
    <link rel="stylesheet" href="../../css/lateral.css">
    <link rel="icon" href="../../img/a.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script> <!-- Adiciona o html2pdf.js -->
    <script src="../../javaScript/lateral.js" defer></script>
    <title>Lista De Ordens</title>
</head>
<body>



   <nav>
    <div class="main-menu">
    <?php echo $top; ?>
</div>

<div class="sidebar">
    <p onclick="toggleDropdown()"><?php echo $nome; ?> ↓  </p>
    
    <ul id="user-menu" class="dropdown">
        <?php if ($token == 11 || $token2 == 11) { ?>
            <li><a href="projetos.php">Projetos</a></li>
        <?php } ?>
        <?php if ($isAdmin) { ?>
            <li><a href="admin.php">Configurações</a>
        <?php } ?>
        <a href="../logout.php">Logout</a></li>
    </ul>
</div>

</nav>
      <div class="container-fluid p-5 text-center ">
              <h1>ORDENS ENVIADAS</h1>
      </div>

      <div class="container mt-3">
          <div class="row">
              <section id="c"> 
                  <table class="table">
                      <tbody>  

                          <tr>
                              <?php if(isset($_SESSION['admin']) && !isset($_SESSION['usuario'])){?> 
                              <th>ID</th><?php }?>
                              <th>Fornecedor</th>
                              <th>Setor</th>
                              <th>Data</th>
                              <th>Status</th>
                              <th>Ações</th>
                          </tr>

                      </tbody>

                                <?php if($num_ordens == 0){?>
                                    <tr>
                                        <td>Nenhuma Ordem Lançada...</td>
                                    </tr>
                                <?php } else {
                                while($ordem = $query_ordens->fetch_assoc() ){
                                    $data = date_create($ordem['Data']);
                                ?>
                          <tr>
                              <?php if(isset($_SESSION['admin']) && !isset($_SESSION['usuario'])){?>
                                  <td><?php echo $ordem['ID'];?></td>
                              <?php }?>

                              <td><?php echo $ordem['fornece'];?></td>
                              <td><?php echo $ordem['setor'];?></td>
                              <td><?php echo date_format($data, "d/M/y");?></td>

                              <td>
                                  <?php
                                    if($ordem['Status'] == 0){
                                        echo"Em Espera Da Aprovação";
                                    } else if($ordem['Status'] == 5){
                                        echo "Aprovada";
                                    } else {
                                        echo "Em Espera Da Aprovação";
                                    }
                                  ?>
                              </td>

                                    <td id="icones">
                                            
                                        <a id="d" href="arquivar.php?idme=<?php echo $ordem['ID'];?>">  

                                        <button title="Arquivar Ordem" idme="<?php echo $ordem['ID'];?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                                            <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1M.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8z"/>
                                        </svg>
                                        </button>

                                        </a>
                                        
                                        <a id="d" href="visualiza.php?idme=<?php echo $ordem['ID'];?>">  

                                        <button title="Baixar PDF" class="generate-pdf">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                            <path d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z"/>
                                            <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103"/>
                                        </svg>
                                        </button>

                                        </a>

                                        <a id="d" href="editar_ordem.php?idme=<?php echo $ordem['ID'];?>">

                                        <button title="Editar Ordem">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                        </svg>
                                        </button>
                                        </a>
                                        
                                        <a id="d" href="visualiza.php?idme=<?php echo $ordem['ID'];?>">

                                        <button title="Visualizar Ordem"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-credit-card-2-front-fill" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z"/>
                                        </svg>
                                        </button>

                                        </a>

                                    </td>
                          </tr>
                        <?php 
                          }
                      }?>
                  </tbody>
              </table>
          </section>
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