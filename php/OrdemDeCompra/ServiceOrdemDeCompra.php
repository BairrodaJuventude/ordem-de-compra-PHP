<?php
require_once '../php/Projetos/ServiceProjetos.php';
require_once 'OrdemDeCompra.php';



 function ListarOrdemDeCompra($IdUsuario, $OrdensRecebidas)
 {

    if (!empty($IdUsuario))
    {

        if($OrdensRecebidas)
        {
            $VerificaUsuario = new usuarios($IdUsuario,null);


            if (($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Compras")||($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Projetos")){

                $ordem = new OrdemDeCompra(null, $IdUsuario, true, false, false,false);

            }else
                if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Coordenador")
                {

                    $ordem = new OrdemDeCompra( null, $IdUsuario, false, false, true, false);

                }else
                    if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Aprovador")
                    {

                        $ordem = new OrdemDeCompra( null, $IdUsuario, false, false, false, true);

                    }else
                    {
                        $ordem = new OrdemDeCompra( null, $IdUsuario, false, true, false, false );
                    }
        }if(!$OrdensRecebidas)
        {
            $ordem = new OrdemDeCompra( null, $IdUsuario, false, true, false, false );
        }

    }else{

        $ordem = new OrdemDeCompra(null, null, null, null, false, false);

    }

    $ordens[] = $ordem->getAll();

    return $ordens;
 }
function selecionaOrdem($Id)
{
    $Ordem = new OrdemDeCompra($Id, null, null, false, false, false);

    return $Ordem->SelecionaOrdem();
}
function pegaIdCriptOrdem($Id)
{
    $pegaOrdem = new OrdemDeCompra(null, null, null, false, false,false);
    $quantidadeOrdens = count($pegaOrdem->getAll());
    for ($i =0; $i<$quantidadeOrdens;$i++)
    {
        if(password_verify($pegaOrdem->getAll()[$i]['ID'], $Id)){
            $IdEncontrado = $pegaOrdem->getAll()[$i]['ID'];
        }
    }
    if(!isset($IdEncontrado)){
        return die("Identificador nao Encontrado");
    }
    return $IdEncontrado;
}
function verificaTokenMostraBotao ($Idusuario, $IdOrdem)
{

    $usuario = new usuarios($Idusuario, null);
    $ordem = new OrdemDeCompra($IdOrdem, null, null,false,false,false);
    $projetos = new Projeto(null, $ordem->SelecionaOrdem()[0]['total']);

    if ((($usuario->SelecionaUsuario()[0]['token'] == "Compras")||($usuario->SelecionaUsuario()[0]['token'] == "admin"))  && ($ordem->SelecionaOrdem()[0]['Status'] == 0)){
        return "<button id='button' style='background-color: #0000ff; color: white;' name='Status' value='1' type='submit'>Encaminhar</button>";
    }
    if ((($usuario->SelecionaUsuario()[0]['token'] == "Coordenador")||($usuario->SelecionaUsuario()[0]['token'] == "admin"))  && ($ordem->SelecionaOrdem()[0]['Status'] == 3)){
        return "<button id='button' style='background-color: #0000ff; color: white;' name='Status' value='4' type='submit'>Encaminhar</button>";
    }
    if ((($usuario->SelecionaUsuario()[0]['token'] == "Projetos")|| ($usuario->SelecionaUsuario()[0]['token'] == "admin"))  && ($ordem->SelecionaOrdem()[0]['Status'] == 1)){
        if (is_string($projetos->getAll())){
             $teste[] ="Nenhum Projeto Com Este Valor";
            return $teste;
        }
        return $projetos->getAll();
    }
    if ((($usuario->SelecionaUsuario()[0]['token'] == "Compras")||($usuario->SelecionaUsuario()[0]['token'] == "admin") ) && ($ordem->SelecionaOrdem()[0]['Status'] == 2)){
        return "<button id='button' style='background-color: #0000ff; color: white;' name='Status' value='3' type='submit'>Encaminhar</button>";
    }
    if ((($usuario->SelecionaUsuario()[0]['token'] == "Aprovador")||($usuario->SelecionaUsuario()[0]['token'] == "admin"))  && ($ordem->SelecionaOrdem()[0]['Status'] == 4)){
        return "<button id='button' style='background-color: #0000ff; color: white;' name='Status' value='5' type='submit'>Aprovar</button>";
    }


}
function segueRota($numeroRota, $IdOrdem, $IdProjeto)
{
    include '../php/Configuracao/conexao.php';
    if ($IdProjeto != Null){
        $mysql->query("UPDATE ordens SET Status = '$numeroRota', id_projeto = '$IdProjeto' WHERE ID = '$IdOrdem'");
    }else{
        $mysql->query("UPDATE ordens SET Status = '$numeroRota' WHERE ID = '$IdOrdem'");
    }

}