<?php

require_once 'Usuarios.php';

function cadastrarUsuario()
{

    include ('../php/Configuracao/conexao.php');

    $nome = $mysql->escape_string($_POST['nome']);
    $email = $mysql->escape_string($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $token = $_POST['token'];
    $token2 = $_POST['token2'];

    if((!empty($nome))&&(!empty($email))&&(!empty($senha))&&(!empty($token))&&(!empty($token2))){

        $deuCerto = $mysql->query("INSERT INTO `usuarios`(ID, `nome`, `email`, `senha`, `cadastro`, atualiza, `token`, `token2`, `Status`)
        VALUES ('','$nome', '$email', '$senha', now(), null, '$token', $token2, 1)");

        if ($deuCerto){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }

}

function listarsuarios()
{

    $usuario = new usuarios(null, null);
    $usuarios[] = $usuario->getAll();
    
    return $usuarios;

}
function logout()
{

    if(!isset($_SESSION))
    {
        session_start();
    }

    session_destroy();
    header("location: ../");

}
function verificaAdmin()
{

    if(!isset($_SESSION))
    {
        session_start();
    }

    if (!isset($_SESSION['admin']))
    {

        logout();

    }

}
function editarUsuario($Id, $novoNome, $novoEmail, $novaSenha, $novoToken, $novoToken2)
{

    include ('../php/Configuracao/conexao.php');

    $buscaUsuario = new usuarios($Id, null);
    $quantidade = count($buscaUsuario->getAll());

    for ($i = 0; $i<$quantidade; $i++)
    {

        if ($buscaUsuario->getAll()[$i]['ID'] == $Id)
        {

            $SelecionaId = $buscaUsuario->getAll()[$i]['ID'];

        }
    }
    if (!isset($SelecionaId))
    {
        return die("Identificador Nao Encontrado");
    }

    $selecionaUsuario = new usuarios($SelecionaId, false);

    if (empty($novoNome)||empty($novoToken)||empty($novoEmail))
    {
        return "Preencha Todos Os Campos!";
    }
    if (empty($novaSenha))
    {
        $novaSenhaCrip = $selecionaUsuario->SelecionaUsuario()[0]['senha'];
    }else{
        $novaSenhaCrip = password_hash($novaSenha, PASSWORD_DEFAULT);
    }

    $novoNomeCrip = $mysql->escape_string($novoNome);
    $novoEmailCrip = $mysql->escape_string($novoEmail);
    $novoTokenCrip = $mysql->escape_string($novoToken);
    $novoTokenCrip2 = $mysql->escape_string($novoToken2);
    date_default_timezone_set('America/Sao_Paulo');

   $mysql->query("UPDATE `usuarios` SET `nome`= '$novoNomeCrip',`email`='$novoEmailCrip',`senha`='$novaSenhaCrip',`token`='$novoTokenCrip',,`token2`='$novoTokenCrip2', atualiza = now()  WHERE ID = '$SelecionaId'");

        return true;

}

function pegaId()
{

    if (!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['usuario']))
    {
        $Id =$_SESSION['usuario'];
    }

    if(isset($_SESSION['admin']))
    {
        $Id =$_SESSION['admin'];
    }

    if(!isset($_SESSION['usuario']) && !isset($_SESSION['admin']))
    {
        logout();
    }

    return $Id;
}
function verificaSetorCompras()
{

    include ('../php/Configuracao/conexao.php');

    if (!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['usuario']))
    {
        $Id =$_SESSION['usuario'];
    }

    if(isset($_SESSION['admin']))
    {
        $Id =$_SESSION['admin'];
    }

    if (!$Id)
    {
        logout();
    }

    $dados = new usuarios($Id, false);
    $usuario = $dados->SelecionaUsuario();


    if
    (
        (($usuario[0]['token'] == "Compras")&& ($usuario[0]['token2'] == 'Coordenador')) ||
        (($usuario[0]['token2'] == "Compras")&& ($usuario[0]['token'] == 'Coordenador')) ||
        (($usuario[0]['token'] == "Admin")&& ($usuario[0]['token2'] == 'Admin')) ||
        (($usuario[0]['token2'] == "Admin")&& ($usuario[0]['token'] == 'Admin')) ||
        (($usuario[0]['token'] == "Compras")&& ($usuario[0]['token2'] == 'Compras')) ||
        (($usuario[0]['token2'] == "Compras")&& ($usuario[0]['token'] == 'Compras'))
    )
    {
        return true;
    }else{
        die("Voce Nao tem Permicao Para Acessar Esta Pagina!");
    }

}

function pegaIdCriptUsuario($Id)
{
    $pegaUsuarios = new usuarios(null, null);
    $quantidadeUsuarios = count($pegaUsuarios->getAll());
    for ($i =0; $i<$quantidadeUsuarios;$i++)
    {
        if(password_verify($pegaUsuarios->getAll()[$i]['ID'],$Id)){
            $IdEncontrado = $pegaUsuarios->getAll()[$i]['ID'];
        }
    }
    if(!$IdEncontrado){
        return "Identificador nao Encontrado";
    }
    return $IdEncontrado;
}
function pegaToken($IdUsuario)
{
    $usuario = new usuarios($IdUsuario, null);
    return $usuario->SelecionaUsuario()[0]['token'];
}

function Status($Id)
{
    $usuario = new usuarios($Id, null);

    include ('../php/Configuracao/conexao.php');

    if ($usuario->SelecionaUsuario()[0]['Status'] === 'Desativado')
    {
        $novoStatus = 1;
    }else if($usuario->SelecionaUsuario()[0]['Status'] === 'Ativado')
    {
        $novoStatus = 0;
    }


    $mysql->query("UPDATE `usuarios` SET `Status`= '$novoStatus' WHERE ID = $Id");
    return header("Location: listarUser.php");

}

function listaCoordenadores()
{
    include ('../php/Configuracao/conexao.php');

    $pegaUsuarios = $mysql->query("SELECT * FROM `usuarios` WHERE token = 7 OR token2 = 7");
    $quantidadeUsuarios = $pegaUsuarios->num_rows;

    for ($i=0; $quantidadeUsuarios>$i; $i++)
    {
        $usuarios[$i] = $pegaUsuarios->fetch_assoc();
    }

    return $usuarios;

}
function listaAprovadores()
{
    include ('../php/Configuracao/conexao.php');

    $pegaUsuarios = $mysql->query("SELECT * FROM `usuarios` WHERE token = 5 OR token2 = 5");
    $quantidadeUsuarios = $pegaUsuarios->num_rows;

    for ($i=0; $quantidadeUsuarios>$i; $i++)
    {
        $usuarios[$i] = $pegaUsuarios->fetch_assoc();
    }

    return $usuarios;

}
