<?php

    session_start();

    include '../php/Configuracao/conexao.php';
    include '../php/menu.php';
    require_once '../php/Usuario/ServiceUsuarios.php';



    verificaAdmin();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="icon" href="../img/logobranca.jpg">
        <link rel="stylesheet" href="../css/lateral.css">
        <script src="../javaScript/lateral.js" defer></script>


        <title>Lista De Usuarios</title>

    </head>
    <body>
        <nav class="main-menu">
            <?php
                echo $top;
            ?>
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

                                <td style="text-align: center;">
                                    <a id="d" href="editarUser.php?id=<?php echo password_hash(listarsuarios()[0][$i]['ID'], PASSWORD_DEFAULT); ?>">Editar</a>
                                    <a id="d" href="Status.php?id=<?php echo password_hash(listarsuarios()[0][$i]['ID'], PASSWORD_DEFAULT); ?>">Desativar/Ativar</a>
                                </td>
                            </tr>

                        <?php } ?>
                    </thead>
                </table>
            </section>
        </main>

    </body>
</html>