<?php
require_once '../php/Projetos/ServiceProjetos.php';
require_once 'OrdemDeCompra.php';


function EnviarOrdemDeCompra()
{
    include '../php/Configuracao/conexao.php';


    $Urgencia = $_POST['Urg'];
    $Fornecedor = $mysql->escape_string($_POST['fornece']);
    $Setor = $_POST['setor'];

    $Unidade1 = $mysql->escape_string($_POST['uni1']);
    $Quantidade1 = $_POST['quant1'];
    $Descricao1 = $mysql->escape_string($_POST['desc1']);
    $Dispesa1 = $_POST['setor1'];
    $Preco1 = $mysql->escape_string($_POST['precUni1']);

    $Unidade2 = $mysql->escape_string($_POST['uni2']);
    $Quantidade2 = $_POST['quant2'];
    $Descricao2 = $mysql->escape_string($_POST['desc2']);
    $Dispesa2 = $_POST['setor2'];
    $Preco2 = $mysql->escape_string($_POST['precUni2']);

    $Unidade3 = $mysql->escape_string($_POST['uni3']);
    $Quantidade3 = $_POST['quant3'];
    $Descricao3 = $mysql->escape_string($_POST['desc3']);
    $Dispesa3 = $_POST['setor3'];
    $Preco3 = $mysql->escape_string($_POST['precUni3']);

    $Unidade4 = $mysql->escape_string($_POST['uni4']);
    $Quantidade4 = $_POST['quant4'];
    $Descricao4 = $mysql->escape_string($_POST['desc4']);
    $Dispesa4 = $_POST['setor4'];
    $Preco4 = $mysql->escape_string($_POST['precUni4']);

    $ValorGeral = $_POST['valorTotal'];

    $Requisitante = $_POST['requisitante'];
    $Coordenador = $_POST['assiCoord'];
    $Aprovador = $_POST['aprovador'];

    $path = false;
    $arquivos = $_FILES['arquivos1'];

    if (!empty($_FILES['arquivos1']["size"][0])){

        $grupoImagem = uniqid();

        foreach($arquivos['name'] as $index => $arq){
            $path = enviarImagem($arquivos['error'][$index], $arquivos['name'][$index], $arquivos['tmp_name'][$index], $grupoImagem);
        }

        if ($path == "Falha ao enviar o arquivo"){
            $erro = $path;
        }

        if ($path == "Tipo de arquivo nao aceito"){
            $erro = $path;
        }
    }
    if(isset($erro)){
        die($erro);
        return false;
    }

    $mysql->query("INSERT INTO ordens
    (`fornece`, `setor`, `requisitante`, `coordenador`, `direcao`, `uni1`,
     `uni2`, `uni3`, `uni4`, `quant1`, `quant2`,`quant3`, `quant4`, `prod1`,
     `prod2`, `prod3`, `prod4`, `desp1`, `desp2`,`desp3`, `desp4`, `preco1`,
     `preco2`, `preco3`, `preco4`, `Imagem`, `histAdm`,`histUsu`, `histDir`,
     `histCoo`, `histPro`, `histCom`, `histAlm`,`Urgencia`,`total`, `Status`, `Data`)
    VALUES
     ('$Fornecedor', '$Setor', '$Requisitante', '$Coordenador', '$Aprovador', '$Unidade1',
      '$Unidade2', '$Unidade3', '$Unidade4', '$Quantidade1', '$Quantidade2', '$Quantidade3', '$Quantidade4',
      '$Descricao1', '$Descricao2', '$Descricao3', '$Descricao4', '$Dispesa1', '$Dispesa2', '$Dispesa3', '$Dispesa4',
      $Preco1, '$Preco2', '$Preco3', '$Preco4', '$path', 0, 0, 0, 0, 0, 0, 0, '$Urgencia', '$ValorGeral', 0, NOW())");

    return true;
}
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
    if ((($usuario->SelecionaUsuario()[0]['token'] == "Aprovador")||($usuario->SelecionaUsuario()[0]['token2'] == "Aprovador")||($usuario->SelecionaUsuario()[0]['token'] == "admin"))  && ($ordem->SelecionaOrdem()[0]['Status'] == 4)){
        return "<button id='button' style='background-color: #0000ff; color: white;' name='Status' value='5' type='submit'>Aprovar</button>";
    }


}
function segueRota($numeroRota, $IdOrdem, $IdProjeto)
{
    include '../php/Configuracao/conexao.php';
    if ($IdProjeto != Null){

        $ValorOrdem =  $mysql->query("SELECT * FROM ordens WHERE ID = '$IdOrdem'");

        $ValorProjeto =  $mysql->query("SELECT valor FROM projetos WHERE ID = '$IdProjeto'");

        $NovoValor = $ValorProjeto->fetch_assoc()['valor']-$ValorOrdem->fetch_assoc()['total'];

        $mysql->query("UPDATE ordens SET Status = '$numeroRota', id_projeto = '$IdProjeto' WHERE ID = '$IdOrdem'");
        $mysql->query("UPDATE projetos SET valor = '$NovoValor' WHERE ID = '$IdProjeto'");

    }else{
        $mysql->query("UPDATE ordens SET Status = '$numeroRota' WHERE ID = '$IdOrdem'");
    }

}
function enviarImagem($error, $name, $tmp_name, $grupoImagem){
    include '../php/Configuracao/conexao.php';
    $erro = false;

    if(!empty($error)) {
        $erro = "Falha ao enviar o arquivo";
        return $erro;
    }


    $pasta= "../ImagensOrdens/";
    $nomeDoArquivo = $name;
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));


    if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png' && $extensao != 'svg' &&
        $extensao != 'spd' && $extensao != 'webp' && $extensao != 'raw' && $extensao != 'tiff' &&
        $extensao != 'bmp' ) {
        $erro = "Tipo de arquivo nao aceito";
        return $erro;
    }


    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($tmp_name, $pasta . $novoNomeDoArquivo . "." . $extensao );

    $mysql->query("INSERT INTO `imagensordens`(`NomeOrigem`, `GrupOrdem`, `path`) VALUES ('$nomeDoArquivo', '$grupoImagem', '$path')");

    if(isset($_FILES['arquivos1'])){
        if($deu_certo){
            return $grupoImagem;
        }else
            return $grupoImagem;
    }

}

function listarImagem($grupImagem)
{
    include('../php/Configuracao/conexao.php');

    if (empty($grupImagem)){
        return "<p>Nenhum Arquivo Foi Anexado Nesta Ordem de Compra</p>";
    }

    $selecionaImagem = "SELECT * FROM `imagensordens` WHERE GrupOrdem = '$grupImagem'";
    $verifica = $mysql->query($selecionaImagem)or die($mysql->error);
    $quantImagem = $verifica->num_rows;

    if($quantImagem == 0)
    {
        return "Imagem Nao Incontrada";
    }
    for ($i = 0; $quantImagem > $i; $i++)
    {
        $imagem[$i] = $verifica->fetch_assoc();
    }


    return $imagem;

}

function ArquivarOrdem($IdOrdem,$Requisitante, $Coordenador, $Aprovador)
{

    include '../php/Configuracao/conexao.php';

    if(isset($Requisitante))
    {
        $mysql->query("UPDATE ordens SET histUsu = 1 WHERE ID = '$IdOrdem'");
    }
    if(isset($Coordenador))
    {
        $mysql->query("UPDATE ordens SET histCoo = 1 WHERE ID = '$IdOrdem'");
    }
    if(isset($Aprovador))
    {
        $mysql->query("UPDATE ordens SET histDir= 1 WHERE ID = '$IdOrdem'");
    }

}


// Nao Testado editarOrdem
function editarOrdem($IdOrdem)
{

    include '../php/Configuracao/conexao.php';


    $Urgencia = $_POST['Urg'];
    $Fornecedor = $mysql->escape_string($_POST['fornece']);
    $Setor = $_POST['setor'];

    $Unidade1 = $mysql->escape_string($_POST['uni1']);
    $Quantidade1 = $_POST['quant1'];
    $Descricao1 = $mysql->escape_string($_POST['desc1']);
    $Dispesa1 = $_POST['setor1'];
    $Preco1 = $mysql->escape_string($_POST['precUni1']);

    $Unidade2 = $mysql->escape_string($_POST['uni2']);
    $Quantidade2 = $_POST['quant2'];
    $Descricao2 = $mysql->escape_string($_POST['desc2']);
    $Dispesa2 = $_POST['setor2'];
    $Preco2 = $mysql->escape_string($_POST['precUni2']);

    $Unidade3 = $mysql->escape_string($_POST['uni3']);
    $Quantidade3 = $_POST['quant3'];
    $Descricao3 = $mysql->escape_string($_POST['desc3']);
    $Dispesa3 = $_POST['setor3'];
    $Preco3 = $mysql->escape_string($_POST['precUni3']);

    $Unidade4 = $mysql->escape_string($_POST['uni4']);
    $Quantidade4 = $_POST['quant4'];
    $Descricao4 = $mysql->escape_string($_POST['desc4']);
    $Dispesa4 = $_POST['setor4'];
    $Preco4 = $mysql->escape_string($_POST['precUni4']);

    $ValorGeral = $_POST['valorTotal'];

    $Requisitante = $_POST['requisitante'];
    $Coordenador = $_POST['assiCoord'];
    $Aprovador = $_POST['aprovador'];

    $path = false;
    $arquivos = $_FILES['arquivos1'];

    if (!empty($_FILES['arquivos1']["size"][0])){

        $grupoImagem = uniqid();

        foreach($arquivos['name'] as $index => $arq){
            $path = enviarImagem($arquivos['error'][$index], $arquivos['name'][$index], $arquivos['tmp_name'][$index], $grupoImagem);
        }

        if ($path == "Falha ao enviar o arquivo"){
            $erro = $path;
        }

        if ($path == "Tipo de arquivo nao aceito"){
            $erro = $path;
        }
    }
    if(isset($erro)){
        die($erro);
        return false;
    }

    $mysql->query("UPDATE ordens SET
    fornece = '$Fornecedor', setor = '$Setor', requisitante = '$Requisitante', coordenador = '$Coordenador',
    direcao = '$Aprovador', uni1 = '$Unidade1', uni2 = '$Unidade2', uni3 = '$Unidade3', uni4 = '$Unidade4',
    quant1 = '$Quantidade1', quant2 = '$Quantidade2', quant3 = '$Quantidade3', quant4 = '$Quantidade4',
    prod1 = '$Descricao1', prod2 = '$Descricao2', prod3 = '$Descricao3', prod4 '$Descricao4', desp1 = '$Dispesa1',
    desp2 = '$Dispesa2', desp3 = '$Dispesa3', desp4 = '$Dispesa4', preco1 = '$Preco1', preco2 = '$Preco2',
    preco3 = '$Preco3', preco4 = '$Preco4', Imagem = '$path', Urgencia = '$Urgencia', total = '$ValorGeral',
    Status = 0, dataUpdate = NOW()) WHERE ID = $IdOrdem");

    return true;

}