<?php

    session_start();
    include '../php/Configuracao/conexao.php';
    include '../php/menu.php';
    require_once '../php/OrdemDeCompra/ServiceOrdemDeCompra.php';
    require_once '../php/Usuario/ServiceUsuarios.php';


    verificaAdmin();
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

    
    
    <title>Ordens Geral</title>
    
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
              <h1>ORDENS GERAL</h1>
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

                      <?php   for ($i = 0; $i < count(ListarOrdemDeCompra(Null, Null)[0]); $i++) {?>

                            <tr>
                                <td>
                                    <?php echo ListarOrdemDeCompra(Null, Null )[0][$i]['ID']; ?>
                                </td>
                                <td>
                                    <?php echo ListarOrdemDeCompra(Null, Null, )[0][$i]['fornece']; ?>
                                </td>
                                <td>
                                    <?php echo ListarOrdemDeCompra(Null, Null )[0][$i]['setor']; ?>
                                </td>
                                <td>
                                    <?php echo ListarOrdemDeCompra(Null, Null )[0][$i]['Data']; ?>
                                </td>
                                <td>
                                    <?php echo ListarOrdemDeCompra(Null, Null )[0][$i]['Status']; ?>
                                </td>
                                
                              <td id="icones">

                              <a href="arquivarOrdem.php?id=<?php echo password_hash(ListarOrdemDeCompra(Null, Null )[0][$i]['ID'], PASSWORD_DEFAULT); ?>">
                              <button class="btn_icon" title="Arquivar Ordem" data-id="">
                                  <img src="../img/icons/archive.svg" alt="">
                                  </button>
                                </a>  

                                <a href="editarOrdem.php?id=<?php echo password_hash(ListarOrdemDeCompra(Null, Null)[0][$i]['ID'], PASSWORD_DEFAULT); ?>">
                                <button class="btn_icon" title="Editar Ordem"  data-id="">
                                  <img src="../img/icons/pencil-square.svg" alt="">
                                  </button>
                                </a>

                                <a href="visualizarOrdem.php?id=<?php echo password_hash(ListarOrdemDeCompra(Null, Null )[0][$i]['ID'], PASSWORD_DEFAULT); ?>" >
                                <button class="btn_icon" title="Visualizar Ordem" id="d" href="pages/visualizarOrdem.php">
                                  <img src="../img/icons/credit-card-2-front.svg" alt="">
                                  </button>
                                </a>

                              </td>
                              <?php } ?>
                        
                  </tbody>
              </table>
          </section>
      </div>
  </div>
</main>


</body>
</html>