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


        <title>Lista De Projetos</title>
        
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
            <h1>LISTA DE PROJETOS</h1>
        </div>
        <div class="container mt-3">
            <section  id="c">


                <table class="table">
                    <tbody>
                    <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nome</th>
                        <th>Valor</th>
                    </tr>
                    </tbody>
                    
                        <tr>
                            <td>Nenhum Projeto Cadastrado...</td>
                        </tr>

                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>

                 
                    </tbody>
                </table>

            </section>

    </main>
    </body>
    </html>