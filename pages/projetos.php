<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logobranca.jpg">


    <script src="../javaScript/lateral.js" defer></script>
    <script src="../javaScript/mobile-navbar.js"></script>


        <title>Projetos</title>
        
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
            <h1>FUNÇÕES DO SETOR PROJETOS</h1>
        </div>
        <div class="container mt-3">
            <section id="c">
                <table class="table">
                    <thead>
                    <tr>
                        <th><a id="d" href="cadastrar_projeto.php">Cadastrar Novo Projeto</a></th>
                        <th><a id="d" href="lista_projetos.php">Lista De Projetos</a></th>
                    </tr>

                </table>
            </section>
    </main>

    </body>
    </html>