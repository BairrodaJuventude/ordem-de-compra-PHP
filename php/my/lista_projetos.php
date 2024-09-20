<?php


if(!isset($_SESSION)){
    session_start();
}
//    verificacao de sessao admin
if(isset($_SESSION['usuario'])){
    include('../conexao.php');
    require('../menu.php');

    $ID = $_SESSION['usuario'];

    //    Pega as informacoes do projeto de acordo com o identificador
    $sql_usuarios = "SELECT * FROM usuarios WHERE ID = '$ID'";
    $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();

    if ($usuario['token'] != 11 || $usuario['token2'] != 11){
        header("Location: ../logout.php");
        die();
    }
//    consulta ao banco de dados, Para a listagem de todos projetos
    $sql_projetos = "SELECT * FROM projetos";
    $query_projetos = $mysql->query($sql_projetos) or die($mysql->error);
    $num_projetos = $query_projetos->num_rows;

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="icon" href="../../img/a.jpg">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <title>Lista De Projetos</title>
    </head>
    <body>
    <?php echo $top;?>
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
                    <?php
                    //      Verificacao se ha algum projeto no banco
                    if($num_projetos == 0){?>
                        <tr>
                            <td>Nenhum Projeto Cadastrado...</td>
                        </tr>
                    <?php }else if($num_projetos != 0 ){
//          Listagem de todos projetos cadastrados
                        while($projetos =  $query_projetos->fetch_assoc()){
                            ?>
                            <td><?php echo $projetos['ID'];?></td>
                            <td><?php echo $projetos['nome'];?></td>
                            <td><?php echo $projetos['valor'];?></td>
                            </tr>

                        <?php }
                    }?>

                    </tbody>
                </table>

            </section>

    </main>
    </body>
    </html>
<?php }else{
    header("Location:../logout.php");
    die();
} ?>