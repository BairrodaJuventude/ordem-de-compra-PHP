<?php
    include '../php/conexao.php';
    require_once '../php/Usuario/ServiceUsuarios.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="icon" href="../img/logobranca.jpg">


        <script src="../javaScript/lateral.js" defer></script>
        <script src="../javaScript/mobile-navbar.js"></script>


        <title>Lista De Usuarios</title>

    </head>
    <body>
        <nav class="main-menu">
<!--            --><?php
//                include '../php/menu.php';
//                echo $top;
//            ?>
        </nav>
        <main>
            <div  class="container-fluid p-5 text-center ">
                <h1>LISTA DE USUARIOS</h1>
            </div>
            <div class="container mt-3">
            <section  id="c">
                <table class="table">
                    <tbody>
                    <tr>

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
                        <?php for ($i = 0; $i < count(listarsuarios()[0]); $i++) {?>

                            <tr>
                                <td>
                                    <?php echo listarsuarios()[0][$i]['ID']; ?>
                                </td>
                                <td>
                                    <?php echo listarsuarios()[0][$i]['nome']; ?>
                                </td>
                                <td>
                                    <?php echo listarsuarios()[0][$i]['email']; ?>
                                </td>
                                <td>
                                    <?php echo listarsuarios()[0][$i]['token']; ?>
                                </td>
                                <td>
                                    <?php echo listarsuarios()[0][$i]['cadastro']; ?>
                                </td>
                                <td>
                                    <?php echo listarsuarios()[0][$i]['atualiza']; ?>
                                </td>
                                 <td>
                                    <?php echo listarsuarios()[0][$i]['Status']; ?>
                                </td>

    <!--                         <td>Nenhum Usuario Cadastrado...</td>-->
                            </tr>

                        <?php } ?>
                        <td style="text-align: center;">
                            <a id="d" href="editar.php?idUsu=">Editar</a>
                            <a id="d" href="Status.php?idUsu=">Desativar</a>
                            <a id="d" href="Status.php?idUsu=">Ativar</a>
                        </td>
                    </thead>
                </table>
            </section>
        </main>

    </body>
</html>