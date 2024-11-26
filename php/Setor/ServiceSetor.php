<?php

    include 'Setor.php';

    function listarSetor(): array
    {

        $selecionaSetores = new Setor(null);
        $Setores[] = $selecionaSetores->getAll();

        return $Setores;
    }
    function selecionaSetor($IdSetor): array
    {

        $selecionaSetores = new Setor($IdSetor);
        $Setores[] = $selecionaSetores->getAll();

        return $Setores;
    }
    function cadastraSetor()
    {

        include '../php/Configuracao/conexao.php';

        $nomeSetor =  $mysql->escape_string($_POST['nomeSetor']);

        $rubricas = implode(",", $_POST['rubrica']);
        $valorRubricas = implode(",", $_POST['valorRubrica']);

        $limit= count($_POST['rubrica']);
        $rubricaColuna = $mysql->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME LIKE 'rubricaSetor_%' LIMIT {$limit}");
        $valorRubricaColuna = $mysql->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME LIKE 'valorRubricaSetor_%' LIMIT {$limit}");

        while ($rubrica = $rubricaColuna->fetch_assoc()) {
            $colunasRubrica[] = $rubrica['COLUMN_NAME'];
        }

        while ($valorRubrica = $valorRubricaColuna->fetch_assoc()) {
            $colunasValorRubrica[] = $valorRubrica['COLUMN_NAME'];
        }

        $colunasRubricas = implode(",", $colunasRubrica);
        $colunasValorRubricas = implode(",", $colunasValorRubrica);

        $valorTotalSetor= array_sum($_POST['valorRubrica']);

        $mysql->query("INSERT INTO `setor`(`Setor`,$colunasRubricas, $colunasValorRubricas, `valor`) VALUES ('{$nomeSetor}',{$rubricas} ,{$valorRubricas}, '{$valorTotalSetor}')");

        return true;
    }
function addQuantidadeRubricaSetor($quantidade)
{

    include '../php/Configuracao/conexao.php';

    $diferensa = false;

    $colunas = $mysql->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME LIKE 'rubricaSetor_%' ");
    $quantidadeColumn = $colunas->num_rows;

    $sequencia = range($quantidadeColumn, $quantidade+$quantidadeColumn);
    $i_2 = $quantidade;

    for ($i=$quantidadeColumn;$i<=$quantidade+$quantidadeColumn-1;$i++)
    {

        $mysql->query("ALTER TABLE `setor` ADD `rubricaSetor_{$sequencia[$i_2]}` INT NULL AFTER `valorRubricaSetor_{$quantidadeColumn}`, ADD `valorRubricaSetor_{$sequencia[$i_2]}` double NULL AFTER `rubricaSetor_{$sequencia[$i_2]}` ");
        $mysql->query("ALTER TABLE `setor` ADD FOREIGN KEY (`rubricaSetor_{$sequencia[$i_2]}`) REFERENCES `rubricas`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ");
        $i_2--;

    }

    return true;

}