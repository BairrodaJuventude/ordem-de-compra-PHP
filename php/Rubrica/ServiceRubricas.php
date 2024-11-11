<?php

require_once 'Rubrica.php';

function listarRubricas(): array
{

    $selecionaRubricas = new Rubrica();
    $Rubricas[] = $selecionaRubricas->getAll();

    return $Rubricas;
}

function cadastroRubrica()
{
    include '../php/Configuracao/conexao.php';

    $nome = $mysql->escape_string($_POST['nomeRubrica']);


    $mysql->query("INSERT INTO `rubricas`(ID, `rubrica`, dataCadastro) VALUES ('', '{$nome}', NOW())");

    return true;
}