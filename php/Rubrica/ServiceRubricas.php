<?php

require_once 'Rubrica.php';

function listarRubricas(): array
{

    $selecionaRubricas = new Rubrica(false);
    $Rubricas[] = $selecionaRubricas->getAll();

    return $Rubricas;

}
function selecionaRubrica($IdRubrica): array
{

    $selecionaRubricas = new Rubrica($IdRubrica);
    $Rubricas[] = $selecionaRubricas->getAll();

    return $Rubricas;
}
function cadastroRubrica()
{
    include '../php/Configuracao/conexao.php';

    $nomeRubrica = $mysql->escape_string($_POST['nomeRubrica']);



    $mysql->query("INSERT INTO `rubricas`( `rubrica`) VALUES ('{$nomeRubrica}')");

    return true;
}