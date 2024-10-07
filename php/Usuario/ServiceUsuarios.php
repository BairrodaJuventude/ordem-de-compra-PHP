<?php
require_once 'Usuarios.php';


function listarsuarios()
{

    $usuario = new usuarios(null);
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

    if (isset($_SESSION['admin']))
    {

        return true;

    }else if(isset($_SESSION['usuario']))
    {
        return false;
    }else
    {
        logout();
    }

}
function editarUsuario($Id, $novoNome, $novoEmail, $novaSenha, $novoToken)
{

    include ('../php/Configuracao/conexao.php');

    $buscaUsuario = new usuarios(null);
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

    $selecionaUsuario = new usuarios($SelecionaId);

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
    echo  $SelecionaId;
   $mysql->query("UPDATE `usuarios` SET `nome`= '$novoNomeCrip',`email`='$novoEmailCrip',`senha`='$novaSenhaCrip',`token`='$novoTokenCrip', atualiza =  WHERE ID = '$SelecionaId'");

        return true;

}
function selecionaUsuario($Id)
{
    $usuario = new usuarios($Id);

    return $usuario->SelecionaUsuario();
}
function pegaId()
{
    if(isset($_SESSION['usuario']))
    {
        $Id =$_SESSION['usuario'];
    }
    else
        if(isset($_SESSION['admin']))
    {
        $Id =$_SESSION['admin'];
    }else{
            return logout();
        }

    return $Id;
}

function pegaIdCript($Id)
{
    $pegaUsuarios = new usuarios(null);
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

