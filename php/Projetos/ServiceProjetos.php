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
    $valor = $mysql->escape_string($_POST['valorProjeto']);

    $mysql->query("INSERT INTO `projetos`(`nome`, `valor`) VALUES ('{$nome}', '{$valor}')");

    return true;
}

function addRubrica($quantidade)
{

    include '../php/Configuracao/conexao.php';

    $diferensa = false;

    $colunas = $mysql->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME LIKE 'rubrica_%' ");
    $quantidadeColumn = $colunas->num_rows;

    if ($quantidade>$quantidadeColumn)
    {
        $diferensa =  $quantidade-$quantidadeColumn;
    }

    if ($diferensa)
    {

       $sequencia= range( $quantidadeColumn, $quantidade);

        $i_2 = count($sequencia);

        for ($i=$quantidadeColumn +1;$i<=$quantidade;$i++)
        {

            $mysql->query("ALTER TABLE `projetos` ADD `rubrica_{$sequencia[$i_2-1]}` INT NOT NULL AFTER `rubrica_{$quantidadeColumn}`; ");
            $i_2 -=1;
        }


    }else{
        return "Ja Existe este Numero de colunas!";
    }


    return true;

}