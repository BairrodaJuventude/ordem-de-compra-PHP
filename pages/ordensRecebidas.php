<?php

session_start();
require_once '../php/OrdemDeCompra/ServiceOrdemDeCompra.php';
require_once '../php/Usuario/ServiceUsuarios.php';

include '../php/Configuracao/conexao.php';
include '../php/menu.php';

$Ordem = ListarOrdemDeCompra(pegaId(), false);

?>

<!DOCTYPE html>                                    
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logobranca.jpg">


    <script src="../javaScript/lateral.js" defer></script>
    <script src="../javaScript/mobile-navbar.js"></script>

    
    <title>Ordens Recebidas</title>
    
    
</head>
<body>
<nav class="main-menu">
    
    <?php 
                
        include '../php/menu.php';
        echo $top;
            
    ?>

</nav>
    <main>
      <div class="container-fluid p-5 text-center ">
              <h1>ORDENS RECEBIDAS</h1>
      </div>

      <div class="container mt-3">
          <div class="row">
              <section id="c"> 
                  <table class="table">
                      <tbody>  

                          <tr>
                              <th>ID</th>
                              <th>Fornecedor</th>
                              <th>Setor</th>
                              <th>Data</th>
                              <th>Status</th>
                              <th>Ações</th>
                          </tr>

                      </tbody>

                      <?php if($Ordem[0] !== null){ for ($i = 0; $i < count($Ordem[0]); $i++){ ?>
                            <tr>
                                <td>
                                    <?php echo $Ordem[0][$i]['ID']; ?>
                                </td>
                                <td>
                                    <?php echo $Ordem[0][$i]['fornece']; ?>
                                </td>
                                <td>
                                    <?php echo $Ordem[0][$i]['setor']; ?>
                                </td>
                                <td>
                                    <?php echo $Ordem[0][$i]['Data']; ?>
                                </td>
                                <td>
                                    <?php echo $Ordem[0][$i]['Status']; ?>
                                </td>
                            
                              <td id="icones">

                              <a href="arquivarOrdem.php?id=<?php echo password_hash($Ordem[0][$i]['ID'], PASSWORD_DEFAULT); ?>">
                              <button class="btn_icon" title="Arquivar Ordem" data-id="">
                                  <img src="../img/icons/archive.svg" alt="">
                                  </button>
                                </a>  
                                
                                <a href="editarOrdem.php?id=<?php echo password_hash($Ordem[0][$i]['ID'], PASSWORD_DEFAULT); ?>">
                                  <button class="btn_icon" title="Editar Ordem"  data-id="">
                                  <img src="../img/icons/pencil-square.svg" alt="">
                                  </button>
                                </a>

                                <a href="visualizarOrdem.php?id=<?php echo password_hash($Ordem[0][$i]['ID'], PASSWORD_DEFAULT); ?>" >
                                  <button class="btn_icon" title="Visualizar Ordem" id="d" href="pages/visualizarOrdem.php">
                                  <img src="../img/icons/credit-card-2-front.svg" alt="">
                                  </button>
                                </a>

                              </td>
                          </tr>
                          <?php }}      else{ ?>
                            <tr>
                                <td>
                                    Nenhuma Ordem Enviada!
                                </td>
                            </tr>
                        <?php } ?>
                  </tbody>
              </table>
          </section>
      </div>
  </div>
</main>


</body>
</html>
