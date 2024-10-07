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


    <title>Historico De Ordens</title>
    
</head>
<body>
<nav class="main-menu">

    <?php 
                
        include '../php/menu.php';
        echo $top;
    
    ?>

</nav>
    <main>
      <div  class="container-fluid p-5 text-center ">
              <h1>HISTORICO DE ORDENS</h1>
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
 

      <tr>
        <td>Nenhuma Ordem Lançada...</td>
      </tr>

      <tr>
           
          <td></td>
          <td>
         
          </td>
          <td></td>
          <td>

          </td>




          <td><a id="d" href="visualiza.php">Detalhes</a></td>
        </tr>

     

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