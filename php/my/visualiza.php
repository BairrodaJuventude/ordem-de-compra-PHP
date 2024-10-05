<?php
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['admin']) || isset($_SESSION['usuario'])){
    include('../conexao.php');
    require('../menu.php');
//        faz uma verificacao de sessao para fazer uma requisisao das informacoes do usuario
    if(isset($_SESSION['admin'])&&!isset($_SESSION['usuario'])) {
        $ID =$_SESSION['admin'];
    }else if(!isset($_SESSION['admin'])&&isset($_SESSION['usuario'])){
        $ID = $_SESSION['usuario'];
    }
//    Capta o identificador da ordem de compra via URI
    if(isset($_GET['idme'])){
        $id_ordem = intval($_GET['idme']);
    }else{
        echo "Erro ao Encontrar a ordem de compra";
        die();
    }
//    Faz uma requisisao das informasoes do usuario logado
    $sql_usuario ="SELECT * FROM usuarios WHERE ID = '$ID'";
    $query_usuarios = $mysql->query($sql_usuario) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();

//    Faz uma listagem de todos os coordenadores cadastrados de acordo com seus tokens
    $sql_usuarios_usuario = "SELECT * FROM usuarios WHERE token = '7' ";
    $queryusuarios_usuario = $mysql->query($sql_usuarios_usuario) or die($mysql->error);
    $num_projetos = $queryusuarios_usuario->num_rows;

//    Faz uma requisisao das informasoes da ordem de compra de acordo com o identificador
    $sql_ordem = "SELECT * FROM ordens WHERE ID = '$id_ordem'";
    $query_ordem = $mysql->query($sql_ordem) or die($mysql->error);
    $num_projetos = $query_ordem->num_rows;
    $ordens = $query_ordem->fetch_assoc();

    if ($num_projetos == 0){
        echo "Esta Ordem de Compra nao Existe";
        die();
    }

    if($usuario['token'] == 11 || $usuario['token2'] == 11 ){
        $sql_projetos = "SELECT * FROM projetos";
        $query_projetos = $mysql->query($sql_projetos) or die($mysql->error);
        $num_projetos = $query_projetos->num_rows;


    }else{}

//  Faz uma contagem de arrays do tipo POST
    if(count($_POST) > 0){
        $direcao = 0;
        $status = $ordens['Status'];


//        Verificacao de tokens para o campo de autorizacao
        if($usuario['token']== 12 ||$usuario['token2']== 12 ){
            if(!empty($_POST['Status'])){
                $Status = $_POST['Status'];
            }
            $sql_code = "UPDATE `ordens` SET Status = '$Status', histCom = 1 WHERE ID = '$id_ordem'";
            $deu_certo = $mysql->query($sql_code) or die($mysql->error);
            header("location: lista.php");
            }

        if(($usuario['token'] == 11 || $usuario['token2'] == 11) && (isset($_POST['projeto']))){

            if (empty($_POST['projeto'])){
                echo "Erro ao selecionar o projeto!";
            }
            if(!empty($_POST['Status'])){
                $Status = $_POST['Status'];
            }else{
                $Status = $ordens['Status'];
                echo "Erro Inesperado";
            }

            $id_projeto = $_POST['projeto'];
            $sql = "SELECT * FROM projetos WHERE ID = '$id_projeto'";
            $query = $mysql->query($sql) or die($mysql->error);
            $dados = $query->fetch_assoc();
            if ($Status == 2){

                if($dados['valor']<$ordens['total']){
                    echo "Erro!, O Projeto Selecionado Não tem Verba";
                }else{

                    $novo_valor = $dados['valor']-$ordens['total'];

                    $sql_code = "UPDATE `ordens` SET Status = '$Status', id_projeto = '$id_projeto', histCom = 0, histPro = 1 WHERE ID = '$id_ordem'";
                    $sql_code2 = "UPDATE projetos SET valor = '$novo_valor'  WHERE ID = '$id_projeto'";
                    $deu_certo = $mysql->query($sql_code) or die($mysql->error);
                    $deu_certo2 = $mysql->query($sql_code2) or die($mysql->error);
                    header("location: lista.php");

                }

            }elseif ($Status == 7){
                $sql_code = "UPDATE `ordens` SET Status = '$Status', histCom = 0, histPro = 1 WHERE ID = '$id_ordem'";
                $deu_certo = $mysql->query($sql_code) or die($mysql->error);
                header("location: lista.php");
            }
        }
        if($usuario['token'] == 7 || $usuario['token2'] == 7){
            if(!empty($_POST['assiDi'])){
                $direcao = $_POST['assiDi'];
            }else{
                echo "Erro Verifique os campos preenchidos!";
            }
            if (isset($_POST['Status'])){
                $status = $_POST['Status'];
            }else{
                echo "Erro não esperado!";
            }
            $sql_code = "UPDATE `ordens` SET Status = '$status', direcao = '$direcao', histCoo = 1 WHERE ID = '$id_ordem'";
            $deu_certo = $mysql->query($sql_code) or die($mysql->error);
            header("location: lista.php");
        }
        if($usuario['token'] == 5 || $usuario['token2'] == 5){
            if (isset($_POST['Status'])){
                $status = $_POST['Status'];
            }else{
                echo "Erro não esperado!";
            }
            $sql_code = "UPDATE `ordens` SET Status = '$status', histDir = 1 WHERE ID = '$id_ordem'";
            $deu_certo = $mysql->query($sql_code) or die($mysql->error);
            header("location: lista.php");
        }
    }




    //    Requisicao de usuarios com o token de direcao para o direcionamento
    $sql_usuarios_usuario = "SELECT * FROM usuarios WHERE token AND token2 = '5'";
    $queryusuarios_usuario2 = $mysql->query($sql_usuarios_usuario) or die($mysql->error);
    $num_projetos = $queryusuarios_usuario2->num_rows;


?>



<?php
} else {
    header("Location:../logout.php");
    die();
}
?>