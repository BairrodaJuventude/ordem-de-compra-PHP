<?php
if(!isset($_SESSION)){
    session_start();
}
//    Verifica se existe uma sessao admim ou sessao usuario
if(isset($_SESSION['usuario'])){
    include('../conexao.php');
    require('../menu.php');

    if(isset($_SESSION['usuario']))
    {
        $ID = $_SESSION['usuario'];
    }
//    Pega as informacoes do projeto de acordo com o identificador
    $sql_usuarios = "SELECT * FROM usuarios WHERE ID = '$ID'";
    $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();

    if ($usuario['token'] == 11 || $usuario['token2'] == 11){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="icon" href="../../img/a.jpg">
        <title>Painel</title>
    </head>
    <body>
    <?php
    if(isset($_SESSION['admin']))
    {
        echo $top_adm;
    }else
    {
        echo $top;
    }
    ?>
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

<?php
    }else{
        header("Location:../logout.php");
        die();
    }
    } else{
    header("Location:../logout.php");
    die();
}