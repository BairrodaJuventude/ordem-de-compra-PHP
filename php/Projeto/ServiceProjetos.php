<?php

require_once 'Projeto.php';

function listarProjetos(): array
{

    $selecionaProjetos = new Projeto(null, null);
    $projetos[] = $selecionaProjetos->getAll();

    return $projetos;
}

function cadastroProjeto()
{
    include '../php/Configuracao/conexao.php';

    $nome = $mysql->escape_string($_POST['nomeProjeto']);

    $rubricas = implode(",", $_POST['rubrica']);
    $valorRubricas = implode(",", $_POST['valorRubrica']);

    $limit= count($_POST['rubrica']);
    $rubricaColuna = $mysql->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME LIKE 'rubrica_%' LIMIT {$limit}");
    $valorRubricaColuna = $mysql->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME LIKE 'valorRubrica_%' LIMIT {$limit}");


    while ($rubrica = $rubricaColuna->fetch_assoc()) {
        $colunasRubrica[] = $rubrica['COLUMN_NAME'];
    }

    while ($valorRubrica = $valorRubricaColuna->fetch_assoc()) {
        $colunasValorRubrica[] = $valorRubrica['COLUMN_NAME'];
    }

    $colunasRubricas = implode(",", $colunasRubrica);
    $colunasValorRubricas = implode(",", $colunasValorRubrica);

    $valorTotalProjeto = array_sum($_POST['valorRubrica']);

    $mysql->query("INSERT INTO `projetos`(`nome`,$colunasRubricas, $colunasValorRubricas, `valor`) VALUES ('{$nome}',{$rubricas} ,{$valorRubricas}, '{$valorTotalProjeto}')");

    return true;
}

function editarProjeto($IdProjeto)
{
    include '../php/configuracao/conexao.php';

    $novoNome = $mysql->escape_string($_POST['nomeProjeto']);

    $novaRubrica = implode(",", $mysql->escape_string($_POST['rubrica']));

    $novoValorRubrica = implode(",",  $mysql->escape_string($_POST['valorRubrica']));

    $colunasRubrica = $mysql->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME LIKE 'rubrica_%' ");
    $colunasValorRubrica = $mysql->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME LIKE 'valorRubrica_%' ");

    $mysql->query("");
}

function addQuantidadeRubrica($quantidade)
{

    include '../php/Configuracao/conexao.php';

    $diferensa = false;

    $colunas = $mysql->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME LIKE 'rubrica_%' ");
    $quantidadeColumn = $colunas->num_rows;

    $sequencia = range($quantidadeColumn, $quantidade+$quantidadeColumn);
    $i_2 = $quantidade;

    for ($i=$quantidadeColumn;$i<=$quantidade+$quantidadeColumn-1;$i++)
    {

        $mysql->query("ALTER TABLE `projetos` ADD `rubrica_{$sequencia[$i_2]}` INT NULL AFTER `valorRubrica_{$quantidadeColumn}`, ADD `valorRubrica_{$sequencia[$i_2]}` double NULL AFTER `rubrica_{$sequencia[$i_2]}` ");
        $i_2--;

    }

    return true;

}