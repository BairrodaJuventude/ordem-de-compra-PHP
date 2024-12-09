<?php



require_once 'orsamento.php';

function listarOrsamentos(): array
{

    $selecionaOrsamentos = new orsamento(false);
    $orsamentos[] = $selecionaOrsamentos->getAll();


    return $orsamentos;
}
function selecionaOrsamento($Idorsamento): array
{

    $selecionaOrsamentos = new orsamento($Idorsamento);
    $orsamentos[] = $selecionaOrsamentos->getAll();

    return $orsamentos;
}

function cadastroOrsamento()
{
    include '../php/Configuracao/conexao.php';

    $IdSetor = $mysql->escape_string($_POST['IdSetorOrsamento']);

    $rubricas = implode(",", $_POST['rubrica']);
    $valorRubricas = implode(",", $_POST['valorRubrica']);

    $limit= count($_POST['rubrica']);
    $rubricaColuna = $mysql->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'orsamentos' AND TABLE_SCHEMA ='compras' AND COLUMN_NAME LIKE 'rubricaSetor_%' LIMIT {$limit}");
    $valorRubricaColuna = $mysql->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'orsamentos' AND TABLE_SCHEMA ='compras' AND COLUMN_NAME LIKE 'valorRubricaSetor_%' LIMIT {$limit}");


    while ($rubrica = $rubricaColuna->fetch_assoc()) {
        $colunasRubrica[] = $rubrica['COLUMN_NAME'];
    }

    while ($valorRubrica = $valorRubricaColuna->fetch_assoc()) {
        $colunasValorRubrica[] = $valorRubrica['COLUMN_NAME'];
    }

    $colunasRubricas = implode(",", $colunasRubrica);
    $colunasValorRubricas = implode(",", $colunasValorRubrica);

    $valorTotalorsamento = array_sum($_POST['valorRubrica']);

    $mysql->query("INSERT INTO `orsamentos`(`Id_setor`,$colunasRubricas, $colunasValorRubricas, `total`) VALUES ('{$IdSetor}',{$rubricas} ,{$valorRubricas}, '{$valorTotalorsamento}')");

    return true;
}

function editarOrsamento($IdOrsamento)
{
    include '../php/configuracao/conexao.php';

    $IdSetor = $mysql->escape_string($_POST['IdSetorOrsamento']);

    $limit= count($_POST['rubrica']);
    $colunasRubricaGrupo = $mysql->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'orsamentos' AND TABLE_SCHEMA ='compras' AND COLUMN_NAME LIKE 'rubricaSetor_%' LIMIT {$limit}");
    $colunasValorRubricaGrupo = $mysql->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'orsamentos' AND TABLE_SCHEMA ='compras' AND COLUMN_NAME LIKE 'valorRubricaSetor_%' LIMIT {$limit}");


    while ($rubrica = $colunasRubricaGrupo->fetch_assoc())
    {
        $colunasRubrica[] = $rubrica['COLUMN_NAME'];
    }

    while ($valorRubrica = $colunasValorRubricaGrupo->fetch_assoc())
    {
        $colunasValorRubrica[] = $valorRubrica['COLUMN_NAME'];
    }

    for($i=0;$i<$limit;$i++)
    {
        $rubricasValores[] = $colunasRubrica[$i].'='. $_POST['rubrica'][$i];
        $valoresRubricas[] = $colunasValorRubrica[$i].'='. $_POST['valorRubrica'][$i];
    }

    $rubricasValores = implode(",", $rubricasValores);

    $valoresRubricas = implode(",", $valoresRubricas);

    $novoValorTotalorsamento = array_sum($_POST['valorRubrica']);

    $mysql->query("UPDATE `orsamentos` SET Id_setor = '{$IdSetor}', {$rubricasValores}, {$valoresRubricas}, total = {$novoValorTotalorsamento} WHERE ID = {$IdOrsamento}");
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

        $mysql->query("ALTER TABLE `orsamentos` ADD `rubrica_{$sequencia[$i_2]}` INT NULL AFTER `valorRubrica_{$quantidadeColumn}`, ADD `valorRubrica_{$sequencia[$i_2]}` double NULL AFTER `rubrica_{$sequencia[$i_2]}` ");
        $mysql->query("ALTER TABLE `orsamentos` ADD FOREIGN KEY (`rubrica_{$sequencia[$i_2]}`) REFERENCES `rubricas`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ");
        $i_2--;

    }

    return true;

}