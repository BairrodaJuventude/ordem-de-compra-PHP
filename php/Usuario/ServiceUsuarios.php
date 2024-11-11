<?php
require_once 'Usuarios.php';


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
function editarUsuario($Id, $novoNome, $novoEmail, $novaSenha, $novoToken)
{

    include ('../php/Configuracao/conexao.php');

    $buscaUsuario = new usuarios(null, null);
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

    $selecionaUsuario = new usuarios($SelecionaId, null);

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
    date_default_timezone_set('America/Sao_Paulo');

   $mysql->query("UPDATE `usuarios` SET `nome`= '$novoNomeCrip',`email`='$novoEmailCrip',`senha`='$novaSenhaCrip',`token`='$novoTokenCrip', atualiza = now()  WHERE ID = '$SelecionaId'");

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

