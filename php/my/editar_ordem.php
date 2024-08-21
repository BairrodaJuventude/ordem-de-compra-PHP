<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['admin'])||(isset($_SESSION['usuario']))){
    include('../conexao.php');
    require('../menu.php');
    $idOrdem = intval($_GET['idme']);
    if(isset($_SESSION['admin'])){
        $ID = $_SESSION['admin'];
    }else{
        $ID = $_SESSION['usuario'];
    }

    $dadosBanco = "SELECT * FROM ordens WHERE ID = '$idOrdem'";
    $queryDados = $mysql->query($dadosBanco);
    $dados = $queryDados->fetch_assoc();
    if(count($_POST) > 0) {

        $fornece = $mysql->escape_string($_POST['fornece']);
        $setor = $mysql->escape_string($_POST['setor']);
        $uni1 = $mysql->escape_string($_POST['uni1']);

        $uni2 = 0;
        $uni3 = 0;
        $uni4 = 0;
        $uni5 = 0;
        $uni6 = 0;
        $uni7 = 0;
        $uni8 = 0;
        $uni9 = 0;
        $uni10 = 0;
        $uni11 = 0;
        $uni12 = 0;
        $uni13 = 0;
        $uni14 = 0;
        $uni15 = 0;
        $uni16 = 0;
        $uni17 = 0;
        $uni18 = 0;
        $uni19 = 0;
        $uni20 = 0;
        $quant1 = 0;
        $quant2 = 0;
        $quant3 = 0;
        $quant4 = 0;
        $quant5 = 0;
        $quant6 = 0;
        $quant7 = 0;
        $quant8 = 0;
        $quant9 = 0;
        $quant10 = 0;
        $quant11 = 0;
        $quant12 = 0;
        $quant13 = 0;
        $quant14 = 0;
        $quant15 = 0;
        $quant16 = 0;
        $quant17 = 0;
        $quant18 = 0;
        $quant19 = 0;
        $quant20 = 0;
        $setor1 = 0;
        $setor2 = 0;
        $setor3 = 0;
        $setor4 = 0;
        $setor5 = 0;
        $setor6 = 0;
        $setor7 = 0;
        $setor8 = 0;
        $setor9 = 0;
        $setor10 = 0;
        $setor11 = 0;
        $setor12 = 0;
        $setor13 = 0;
        $setor14 = 0;
        $setor15 = 0;
        $setor16 = 0;
        $setor17 = 0;
        $setor18 = 0;
        $setor19 = 0;
        $setor20 = 0;
        $desc1 = 0;
        $desc2 = 0;
        $desc3 = 0;
        $desc4 = 0;
        $desc5 = 0;
        $desc6 = 0;
        $desc7 = 0;
        $desc8 = 0;
        $desc9 = 0;
        $desc10 = 0;
        $desc11 = 0;
        $desc12 = 0;
        $desc13 = 0;
        $desc14 = 0;
        $desc15 = 0;
        $desc16 = 0;
        $desc17 = 0;
        $desc18 = 0;
        $desc19 = 0;
        $desc20 = 0;
        $precUni1 = 0;
        $precUni2 = 0;
        $precUni3 = 0;
        $precUni4 = 0;
        $precUni5 = 0;
        $precUni6 = 0;
        $precUni7 = 0;
        $precUni8 = 0;
        $precUni9 = 0;
        $precUni10 = 0;
        $precUni11 = 0;
        $precUni12 = 0;
        $precUni13 = 0;
        $precUni14 = 0;
        $precUni15 = 0;
        $precUni16 = 0;
        $precUni17 = 0;
        $precUni18 = 0;
        $precUni19 = 0;
        $precUni20 = 0;

        if (isset($_POST['uni2'])) {
            $uni2 = $mysql->escape_string($_POST['uni2']);
        } else {
        }
        if (isset($_POST['uni3'])) {
            $uni3 = $mysql->escape_string($_POST['uni3']);
        } else {
        }
        if (isset($_POST['uni4'])) {
            $uni4 = $mysql->escape_string($_POST['uni4']);
        } else {
        }
        if (isset($_POST['uni5'])) {
            $uni5 = $mysql->escape_string($_POST['uni5']);
        }
        if (isset($_POST['uni6'])) {
            $uni6 = $mysql->escape_string($_POST['uni6']);
        } else {
        }
        if (isset($_POST['uni7'])) {
            $uni7 = $mysql->escape_string($_POST['uni7']);
        } else {
        }
        if (isset($_POST['uni8'])) {
            $uni8 = $mysql->escape_string($_POST['uni8']);
        } else {
        }
        if (isset($_POST['uni9'])) {
            $uni9 = $mysql->escape_string($_POST['uni9']);
        } else {
        }
        if (isset($_POST['uni10'])) {
            $uni10 = $mysql->escape_string($_POST['uni10']);
        } else {
        }
        if (isset($_POST['uni11'])) {
            $uni11 = $mysql->escape_string($_POST['uni11']);
        } else {
        }
        if (isset($_POST['uni12'])) {
            $uni12 = $mysql->escape_string($_POST['uni12']);
        } else {
        }
        if (isset($_POST['uni13'])) {
            $uni13 = $mysql->escape_string($_POST['uni13']);
        } else {
        }
        if (isset($_POST['uni14'])) {
            $uni14 = $mysql->escape_string($_POST['uni14']);
        } else {
        }
        if (isset($_POST['uni15'])) {
            $uni15 = $mysql->escape_string($_POST['uni15']);
        } else {
        }
        if (isset($_POST['uni16'])) {
            $uni16 = $mysql->escape_string($_POST['uni16']);
        } else {
        }
        if (isset($_POST['uni17'])) {
            $uni17 = $mysql->escape_string($_POST['uni17']);
        } else {
        }
        if (isset($_POST['uni18'])) {
            $uni18 = $mysql->escape_string($_POST['uni18']);
        } else {
        }
        if (isset($_POST['uni19'])) {
            $uni19 = $mysql->escape_string($_POST['uni19']);
        } else {
        }
        if (isset($_POST['uni20'])) {
            $uni20 = $mysql->escape_string($_POST['uni20']);
        } else {
        }
        if (isset($_POST['quant1'])) {
            $quant1 = $mysql->escape_string($_POST['quant1']);
        } else {
        }
        if (isset($_POST['quant2'])) {
            $quant2 = $mysql->escape_string($_POST['quant2']);
        } else {
        }
        if (isset($_POST['quant3'])) {
            $quant3 = $mysql->escape_string($_POST['quant3']);
        } else {
        }
        if (isset($_POST['quant4'])) {
            $quant4 = $mysql->escape_string($_POST['quant4']);
        } else {
        }
        if (isset($_POST['quant5'])) {
            $quant5 = $mysql->escape_string($_POST['quant5']);
        } else {
        }
        if (isset($_POST['quant6'])) {
            $quant6 = $mysql->escape_string($_POST['quant6']);
        } else {
        }
        if (isset($_POST['quant7'])) {
            $quant7 = $mysql->escape_string($_POST['quant7']);
        } else {
        }
        if (isset($_POST['quant8'])) {
            $quant8 = $mysql->escape_string($_POST['quant8']);
        } else {
        }
        if (isset($_POST['quant9'])) {
            $quant9 = $mysql->escape_string($_POST['quant9']);
        } else {
        }
        if (isset($_POST['quant10'])) {
            $quant10 = $mysql->escape_string($_POST['quant10']);
        } else {
        }
        if (isset($_POST['quant11'])) {
            $quant11 = $mysql->escape_string($_POST['quant11']);
        } else {
        }
        if (isset($_POST['quant12'])) {
            $quant12 = $mysql->escape_string($_POST['quant12']);
        } else {
        }
        if (isset($_POST['quant13'])) {
            $quant13 = $mysql->escape_string($_POST['quant13']);
        } else {
        }
        if (isset($_POST['quant14'])) {
            $quant14 = $mysql->escape_string($_POST['quant14']);
        } else {
        }
        if (isset($_POST['quant15'])) {
            $quant15 = $mysql->escape_string($_POST['quant15']);
        } else {
        }
        if (isset($_POST['quant16'])) {
            $quant16 = $mysql->escape_string($_POST['quant16']);
        } else {
        }
        if (isset($_POST['quant17'])) {
            $quant17 = $mysql->escape_string($_POST['quant17']);
        } else {
        }
        if (isset($_POST['quant18'])) {
            $quant18 = $mysql->escape_string($_POST['quant18']);
        } else {
        }
        if (isset($_POST['quant19'])) {
            $quant19 = $mysql->escape_string($_POST['quant19']);
        } else {
        }
        if (isset($_POST['quant20'])) {
            $quant20 = $mysql->escape_string($_POST['quant20']);
        } else {
        }
        if (isset($_POST['setor1'])) {
            $setor1 = $mysql->escape_string($_POST['setor1']);
        } else {
        }
        if (isset($_POST['setor2'])) {
            $setor2 = $mysql->escape_string($_POST['setor2']);
        } else {
        }
        if (isset($_POST['setor3'])) {
            $setor3 = $mysql->escape_string($_POST['setor3']);
        } else {
        }
        if (isset($_POST['setor4'])) {
            $setor4 = $mysql->escape_string($_POST['setor4']);
        } else {
        }
        if (isset($_POST['setor5'])) {
            $setor5 = $mysql->escape_string($_POST['setor5']);
        } else {
        }
        if (isset($_POST['setor6'])) {
            $setor6 = $mysql->escape_string($_POST['setor6']);
        } else {
        }
        if (isset($_POST['setor7'])) {
            $setor7 = $mysql->escape_string($_POST['setor7']);
        } else {
        }
        if (isset($_POST['setor8'])) {
            $setor8 = $mysql->escape_string($_POST['setor8']);
        } else {
        }
        if (isset($_POST['setor9'])) {
            $setor9 = $mysql->escape_string($_POST['setor9']);
        } else {
        }
        if (isset($_POST['setor10'])) {
            $setor10 = $mysql->escape_string($_POST['setor10']);
        } else {
        }
        if (isset($_POST['setor11'])) {
            $setor11 = $mysql->escape_string($_POST['setor11']);
        } else {
        }
        if (isset($_POST['setor12'])) {
            $setor12 = $mysql->escape_string($_POST['setor12']);
        } else {
        }
        if (isset($_POST['setor13'])) {
            $setor13 = $mysql->escape_string($_POST['setor13']);
        } else {
        }
        if (isset($_POST['setor14'])) {
            $setor14 = $mysql->escape_string($_POST['setor14']);
        } else {
        }
        if (isset($_POST['setor15'])) {
            $setor15 = $mysql->escape_string($_POST['setor15']);
        } else {
        }
        if (isset($_POST['setor16'])) {
            $setor16 = $mysql->escape_string($_POST['setor16']);
        } else {
        }
        if (isset($_POST['setor17'])) {
            $setor17 = $mysql->escape_string($_POST['setor17']);
        } else {
        }
        if (isset($_POST['setor18'])) {
            $setor18 = $mysql->escape_string($_POST['setor18']);
        } else {
        }
        if (isset($_POST['setor19'])) {
            $setor19 = $mysql->escape_string($_POST['setor19']);
        } else {
        }
        if (isset($_POST['setor20'])) {
            $setor20 = $mysql->escape_string($_POST['setor20']);
        } else {
        }
        if (isset($_POST['desc1'])) {
            $desc1 = $mysql->escape_string($_POST['desc1']);
        } else {
        }
        if (isset($_POST['desc2'])) {
            $desc2 = $mysql->escape_string($_POST['desc2']);
        } else {
        }
        if (isset($_POST['desc3'])) {
            $desc3 = $mysql->escape_string($_POST['desc3']);
        } else {
        }
        if (isset($_POST['desc4'])) {
            $desc4 = $mysql->escape_string($_POST['desc4']);
        } else {
        }
        if (isset($_POST['desc5'])) {
            $desc5 = $mysql->escape_string($_POST['desc5']);
        } else {
        }
        if (isset($_POST['desc6'])) {
            $desc6 = $mysql->escape_string($_POST['desc6']);
        } else {
        }
        if (isset($_POST['desc7'])) {
            $desc7 = $mysql->escape_string($_POST['desc7']);
        } else {
        }
        if (isset($_POST['desc8'])) {
            $desc8 = $mysql->escape_string($_POST['desc8']);
        } else {
        }
        if (isset($_POST['desc9'])) {
            $desc9 = $mysql->escape_string($_POST['desc9']);
        } else {
        }
        if (isset($_POST['desc10'])) {
            $desc10 = $mysql->escape_string($_POST['desc10']);
        } else {
        }
        if (isset($_POST['desc11'])) {
            $desc11 = $mysql->escape_string($_POST['desc11']);
        } else {
        }
        if (isset($_POST['desc12'])) {
            $desc12 = $mysql->escape_string($_POST['desc12']);
        } else {
        }
        if (isset($_POST['desc13'])) {
            $desc13 = $mysql->escape_string($_POST['desc13']);
        } else {
        }
        if (isset($_POST['desc14'])) {
            $desc14 = $mysql->escape_string($_POST['desc14']);
        } else {
        }
        if (isset($_POST['desc15'])) {
            $desc15 = $mysql->escape_string($_POST['desc15']);
        } else {
        }
        if (isset($_POST['desc16'])) {
            $desc16 = $mysql->escape_string($_POST['desc16']);
        } else {
        }
        if (isset($_POST['desc17'])) {
            $desc17 = $mysql->escape_string($_POST['desc17']);
        } else {
        }
        if (isset($_POST['desc18'])) {
            $desc18 = $mysql->escape_string($_POST['desc18']);
        } else {
        }
        if (isset($_POST['desc19'])) {
            $desc19 = $mysql->escape_string($_POST['desc19']);
        } else {
        }
        if (isset($_POST['desc20'])) {
            $desc20 = $mysql->escape_string($_POST['desc20']);
        } else {
        }
        if (isset($_POST['precUni1'])) {
            $precUni1 = $mysql->escape_string($_POST['precUni1']);
        } else {
        }
        if (isset($_POST['precUni2'])) {
            $precUni2 = $mysql->escape_string($_POST['precUni2']);
        } else {
        }
        if (isset($_POST['precUni3'])) {
            $precUni3 = $mysql->escape_string($_POST['precUni3']);
        } else {
        }
        if (isset($_POST['precUni4'])) {
            $precUni4 = $mysql->escape_string($_POST['precUni4']);
        } else {
        }
        if (isset($_POST['precUni5'])) {
            $precUni5 = $mysql->escape_string($_POST['precUni5']);
        } else {
        }
        if (isset($_POST['precUni6'])) {
            $precUni6 = $mysql->escape_string($_POST['precUni6']);
        } else {
        }
        if (isset($_POST['precUni7'])) {
            $precUni7 = $mysql->escape_string($_POST['precUni7']);
        } else {
        }
        if (isset($_POST['precUni8'])) {
            $precUni8 = $mysql->escape_string($_POST['precUni8']);
        } else {
        }
        if (isset($_POST['precUni9'])) {
            $precUni9 = $mysql->escape_string($_POST['precUni9']);
        } else {
        }
        if (isset($_POST['precUni10'])) {
            $precUni10 = $mysql->escape_string($_POST['precUni10']);
        } else {
        }
        if (isset($_POST['precUni11'])) {
            $precUni11 = $mysql->escape_string($_POST['precUni11']);
        } else {
        }
        if (isset($_POST['precUni12'])) {
            $precUni12 = $mysql->escape_string($_POST['precUni12']);
        } else {
        }
        if (isset($_POST['precUni13'])) {
            $precUni13 = $mysql->escape_string($_POST['precUni13']);
        } else {
        }
        if (isset($_POST['precUni14'])) {
            $precUni14 = $mysql->escape_string($_POST['precUni14']);
        } else {
        }
        if (isset($_POST['precUni15'])) {
            $precUni15 = $mysql->escape_string($_POST['precUni15']);
        } else {
        }
        if (isset($_POST['precUni16'])) {
            $precUni16 = $mysql->escape_string($_POST['precUni16']);
        } else {
        }
        if (isset($_POST['precUni17'])) {
            $precUni17 = $mysql->escape_string($_POST['precUni17']);
        } else {
        }
        if (isset($_POST['precUni18'])) {
            $precUni18 = $mysql->escape_string($_POST['precUni18']);
        } else {
        }
        if (isset($_POST['precUni19'])) {
            $precUni19 = $mysql->escape_string($_POST['precUni19']);
        } else {
        }
        if (isset($_POST['precUni20'])) {
            $precUni20 = $mysql->escape_string($_POST['precUni20']);
        } else {
        }
        $total = $_POST['valorTotal'];

        $assi1 = $dados['requisitante'];
        $assiCoord = $dados['coordenador'];


        $sql_code = "
UPDATE `ordens` SET `fornece`='$fornece',`setor`='$setor',
`requisitante`='$assi1',`coordenador`='$assiCoord',`direcao`='0',
`comprador`='0',`resebido`='0',`estado`='0',
`uni1`='$uni1',`uni2`='$uni2',`uni3`='$uni3',`uni4`='$uni4',
`uni5`='$uni5',`uni6`='$uni6',`uni7`='$uni7',`uni8`='$uni8',
`uni9`='$uni9',`uni10`='$uni10',`uni11`='$uni11',`uni12`='$uni12',
`uni13`='$uni13',`uni14`='$uni14',`uni15`='$uni15',`uni16`='$uni16',
`uni17`='$uni17',`uni18`='$uni18',`uni19`='$uni19',`uni20`='$uni20',
`quant1`='$quant1',`quant2`='$quant2',`quant3`='$quant3',`quant4`='$quant4',
`quant5`='$quant5',`quant6`='$quant6',`quant7`='$quant7',`quant8`='$quant8',
`quant9`='$quant9',`quant10`='$quant10',`quant11`='$quant11',`quant12`='$quant12',
`quant13`='$quant13',`quant14`='$quant14',`quant15`='$quant15',`quant16`='$quant16',
`quant17`='$quant17',`quant18`='$quant18',`quant19`='$quant19',`quant20`='$quant20',
`prod1`='$desc1',`prod2`='$desc2',`prod3`='$desc3',`prod4`='$desc4',
`prod5`='$desc5',`prod6`='$desc6',`prod7`='$desc7',`prod8`='$desc8',
`prod9`='$desc9',`prod10`='$desc10',`prod11`='$desc11',`prod12`='$desc12',
`prod13`='$desc13',`prod14`='$desc14',`prod15`='$desc15',`prod16`='$desc16',
`prod17`='$desc17',`prod18`='$desc18',`prod19`='$desc19',`prod20`='$desc20',
`desp1`='$setor1',`desp2`='$setor2',`desp3`='$setor3',`desp4`='$setor4',
`desp5`='$setor5',`desp6`='$setor6',`desp7`='$setor7',`desp8`='$setor8',
`desp9`='$setor9',`desp10`='$setor10',`desp11`='$setor11',`desp12`='$setor12',
`desp13`='$setor13',`desp14`='$setor14',`desp15`='$setor15',`desp16`='$setor16',
`desp17`='$setor17',`desp18`='$setor18',`desp19`='$setor19',`desp20`='$setor20',
`preco1`='$precUni1',`preco2`='$precUni2',`preco3`='$precUni3',`preco4`='$precUni4',
`preco5`='$precUni5',`preco6`='$precUni6',`preco7`='$precUni7',`preco8`='$precUni8',
`preco9`='$precUni9',`preco10`='$precUni10',`preco11`='$precUni11',`preco12`='$precUni12',
`preco13`='$precUni13',`preco14`='$precUni14',`preco15`='$precUni15',`preco16`='$precUni16',
`preco17`='$precUni17',`preco18`='$precUni18',`preco19`='$precUni19',`preco20`='$precUni20',
`total`='$total',`Status`='0',`Data`=''";
        $deu_certo = $mysql->query($sql_code) or die($mysql->error);

        if ($deu_certo) {
            $erro = false;
            $mensagem_sucesso = "Enviado Com sucesso!";
        }



    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="icon" href="../../img/a.jpg">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <title>Projeto</title>
    </head>

    <body>
    <?php if (isset($_SESSION['usuario'])) {
        echo $top;
    } else if (isset($_SESSION['admin'])) {
        echo $top_adm;
    } ?>

    <main style="height: 84vh;">
        <div class="container-fluid p-5 text-center">
            <h1>ORDEM DE COMPRA</h1>
        </div>
        <?php if (isset($erro)&& $erro!=false): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erro; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($mensagem_sucesso)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $mensagem_sucesso; ?>
            </div>
        <?php endif; ?>
        <div class="container mt-3">
            <section id="c">
                <table class="table">
                    <thead>
                    <tr>
                        <form action="" method="post">
                            <tr>
                                <th><b>Fornecedor:</b><input id="a" name="fornece" value="<?php if (isset($dados['fornece'])){echo $dados['fornece'];} ?>" type="text" required></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th><b>Setor:</b> <select class="span12" name="setor" id="a" required>
                                        <option  value="<?php if (isset($dados['setor'])){echo $dados['setor'];}?>"><?php if (isset($dados['setor'])) {echo $dados['setor'];} ?></option>
                                        <option value="">Selecionar</option>
                                        <option value="INFANTIL">INFANTIL</option>
                                        <option value="ESCOLA">ESCOLA</option>
                                        <option value="ESP_CULTURAL">ESP_CULTURAL</option>
                                        <option value=" OFICINAS_ESPORTIVAS"> OFICINAS_ESPORTIVAS</option>
                                        <option value="OFICINAS_CULTURAIS">OFICINAS_CULTURAIS</option>
                                        <option value="LABORATORIOS">LABORATORIOS</option>
                                        <option value="PSICOSSOCIAL">PSICOSSOCIAL</option>
                                        <option value="RECURSOS">RECURSOS</option>
                                        <option value="RELACIONAMENTO">RELACIONAMENTO</option>
                                        <option value="COZINHA">COZINHA</option>
                                        <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                        <option value="TRANSPORTE">TRANSPORTE</option>
                                        <option value="ALMOXARIFADO">ALMOXARIFADO</option>
                                        <option value="RH">RH</option>
                                    </select></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>
                                    <!-- Contador de linhas adicionadas -->
                                    <span style="color: #ff0000" id="linhaCount" class="linha-count">4 Colunas adicionadas</span>
                                </th>
                            </tr>
                    </thead>
                </table>
                <table method="post" border="1" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Unidade:</th>
                        <th>Quantidade:</th>
                        <th>Descrição De Produto</th>
                        <th>Tipo De Despesa</th>
                        <th>Preço Da Unidade</th>
                        <th>Valor Total:</th>
                    </tr>
                    </thead>
                    <tbody id="tableBody">
                    <tr>
                        <td><input type="text" value="<?php if (isset($dados['uni1'])){echo $dados['uni1'];}?>"class="unit" name="uni1" required></td>
                        <td><input type="number" value="<?php if (isset($dados['quant1'])){echo $dados['quant1'];}?>" class="quantity" id="v1" oninput="updateTotal(this)" name="quant1"required></td>
                        <td><input type="text" value="<?php if (isset($dados['prod1'])){echo $dados['prod1'];}?>"  class="description"name="desc1" required></td>
                        <td>
                            <select class="span12" name="setor1" id="a" required>
                                <option  value="<?php if (isset($dados['desp1'])){echo $dados['desp1'];}?>" ><?php if (isset($dados['desp1'])){echo $dados['desp1'];}?></option>
                                <option value="">Selecionar</option>
                                <option value="ALIMENTACAO">ALIMENTACAO</option>
                                <option value="VESTUARIO">VESTUARIO</option>
                                <option value="ASSISTENCIA_SOCIAL">ESP_CULTURAL</option>
                                <option value=" BRINDES"> BRINDES</option>
                                <option value="COMBUSTIVEIS">COMBUSTIVEIS</option>
                                <option value="COMPUTADORES_PERIFERICOS">COMPUTADORES_PERIFERICOS</option>
                                <option value="CONSERTO_VEICULO">CONSERTO_VEICULO</option>
                                <option value="CONSERTOS_REPAROS_PREDIAL">CONSERTOS_REPAROS_PREDIAL</option>
                                <option value="CORREIO">CORREIO</option>
                                <option value="CURSOS_TREINAMENTOS">CURSOS_TREINAMENTOS</option>
                                <option value="DESPESAS_COM_VIAGENS">DESPESAS_COM_VIAGENS</option>
                                <option value="FESTAS_PROMOCOES">FESTAS_PROMOCOES</option>
                                <option value="FRETES_CARRETOS">FRETES_CARRETOS</option>
                                <option value="INFORMATICA">INFORMATICA</option>
                                <option value="INSTRUMENTOS_MUSICAIS">INSTRUMENTOS_MUSICAIS</option>
                                <option value="LICENCIAMENTOS">LICENCIAMENTOS</option>
                                <option value="LIMPEZA">LIMPEZA</option>
                                <option value="MAQUINAS_APARELHOS_EQUIPAMENTOS">MAQUINAS_APARELHOS_EQUIPAMENTOS</option>
                                <option value="MATERIAL_CONSUMO">MATERIAL_CONSUMO</option>
                                <option value="MATERIAL_DIDATICO_CEP">MATERIAL_DIDATICO_CEP</option>
                                <option value="MATERIAL_DIDATICO_ESCOLAR">MATERIAL_DIDATICO_ESCOLAR</option>
                                <option value="MATERIAL_EXPEDIENTE">MATERIAL_EXPEDIENTE</option>
                                <option value="MULTAS_DETRAN">MULTAS_DETRAN</option>
                                <option value="PROMOCOES_EVENTOS">PROMOCOES_EVENTOS</option>
                                <option value="PROPAGANDA_PUBLICIDADE">PROPAGANDA_PUBLICIDADE</option>
                                <option value="REMEDIOS_MEDICAMENTOS">REMEDIOS_MEDICAMENTOS</option>
                                <option value="REPRODUCOES_GRAFICAS">REPRODUCOES_GRAFICAS</option>
                                <option value="SEGURO_ADOLESCENTES">SEGURO_ADOLESCENTES</option>
                                <option value="SEGURO_VEICULOS_PREDIAL">SEGURO_VEICULOS_PREDIAL</option>
                            </select>
                        </td>
                        <td><input type="number" value="<?php if (isset($dados['preco1'])){echo $dados['preco1'];}?>" class="unitPrice" id="v2" step="0.01" oninput="updateTotal(this)" name="precUni1" required></td>
                        <td class="totalValue" id="valor">0.00</td>
                    </tr>
                    <tr>
                        <td><input type="text" value="<?php if (isset($dados['uni2'])){echo $dados['uni2'];}?> "class="unit" name="uni2"></td>
                        <td><input type="number" value="<?php if (isset($dados['quant2'])){echo $dados['quant2'];}?>" class="quantity" oninput="updateTotal(this)" name="quant2" ></td>
                        <td><input type="text" value="<?php if (isset($dados['prod2'])){echo $dados['prod2'];}?>" class="description" name="desc2" ></td>
                        <td>
                            <select class="span12" id="a" name="setor2">
                                <option  value="<?php if (isset($dados['desp2'])){echo $dados['desp2'];}?>" ><?php if (isset($dados['desp2'])){echo $dados['desp2'];}?></option>
                                <option value="">Selecionar</option>
                                <option value="ALIMENTACAO">ALIMENTACAO</option>
                                <option value="VESTUARIO">VESTUARIO</option>
                                <option value="ASSISTENCIA_SOCIAL">ESP_CULTURAL</option>
                                <option value=" BRINDES"> BRINDES</option>
                                <option value="COMBUSTIVEIS">COMBUSTIVEIS</option>
                                <option value="COMPUTADORES_PERIFERICOS">COMPUTADORES_PERIFERICOS</option>
                                <option value="CONSERTO_VEICULO">CONSERTO_VEICULO</option>
                                <option value="CONSERTOS_REPAROS_PREDIAL">CONSERTOS_REPAROS_PREDIAL</option>
                                <option value="CORREIO">CORREIO</option>
                                <option value="CURSOS_TREINAMENTOS">CURSOS_TREINAMENTOS</option>
                                <option value="DESPESAS_COM_VIAGENS">DESPESAS_COM_VIAGENS</option>
                                <option value="FESTAS_PROMOCOES">FESTAS_PROMOCOES</option>
                                <option value="FRETES_CARRETOS">FRETES_CARRETOS</option>
                                <option value="INFORMATICA">INFORMATICA</option>
                                <option value="INSTRUMENTOS_MUSICAIS">INSTRUMENTOS_MUSICAIS</option>
                                <option value="LICENCIAMENTOS">LICENCIAMENTOS</option>
                                <option value="LIMPEZA">LIMPEZA</option>
                                <option value="MAQUINAS_APARELHOS_EQUIPAMENTOS">MAQUINAS_APARELHOS_EQUIPAMENTOS</option>
                                <option value="MATERIAL_CONSUMO">MATERIAL_CONSUMO</option>
                                <option value="MATERIAL_DIDATICO_CEP">MATERIAL_DIDATICO_CEP</option>
                                <option value="MATERIAL_DIDATICO_ESCOLAR">MATERIAL_DIDATICO_ESCOLAR</option>
                                <option value="MATERIAL_EXPEDIENTE">MATERIAL_EXPEDIENTE</option>
                                <option value="MULTAS_DETRAN">MULTAS_DETRAN</option>
                                <option value="PROMOCOES_EVENTOS">PROMOCOES_EVENTOS</option>
                                <option value="PROPAGANDA_PUBLICIDADE">PROPAGANDA_PUBLICIDADE</option>
                                <option value="REMEDIOS_MEDICAMENTOS">REMEDIOS_MEDICAMENTOS</option>
                                <option value="REPRODUCOES_GRAFICAS">REPRODUCOES_GRAFICAS</option>
                                <option value="SEGURO_ADOLESCENTES">SEGURO_ADOLESCENTES</option>
                                <option value="SEGURO_VEICULOS_PREDIAL">SEGURO_VEICULOS_PREDIAL</option>
                            </select>
                        </td>
                        <td><input type="number" value=" <?php if (isset($dados['preco2'])){echo $dados['preco2'];}?>" class="unitPrice" step="0.01"  oninput="updateTotal(this)" name="precUni2" ></td>
                        <td class="totalValue"  id="valor" name="vt2">0.00</td>
                    </tr>

                    <tr>
                        <td><input type="text" value="<?php if (isset($dados['uni3'])){echo $dados['uni3'];}?>" class="unit"name="uni3" ></td>
                        <td><input type="number" value="<?php if (isset($dados['quant3'])){echo $dados['quant3'];}?>" class="quantity" oninput="updateTotal(this)"name="quant3" ></td>
                        <td><input type="text" value="<?php if (isset($dados['prod3'])){echo $dados['prod3'];}?>" class="description" name="desc3"></td>
                        <td>
                            <select class="span12"  id="a"name="setor3">
                                <option  value="<?php if (isset($dados['desp3'])){echo $dados['desp3'];}?>" ><?php if (isset($dados['desp3'])){echo $dados['desp3'];}?></option>
                                <option value="">Selecionar</option>
                                <option value="ALIMENTACAO">ALIMENTACAO</option>
                                <option value="VESTUARIO">VESTUARIO</option>
                                <option value="ASSISTENCIA_SOCIAL">ESP_CULTURAL</option>
                                <option value=" BRINDES"> BRINDES</option>
                                <option value="COMBUSTIVEIS">COMBUSTIVEIS</option>
                                <option value="COMPUTADORES_PERIFERICOS">COMPUTADORES_PERIFERICOS</option>
                                <option value="CONSERTO_VEICULO">CONSERTO_VEICULO</option>
                                <option value="CONSERTOS_REPAROS_PREDIAL">CONSERTOS_REPAROS_PREDIAL</option>
                                <option value="CORREIO">CORREIO</option>
                                <option value="CURSOS_TREINAMENTOS">CURSOS_TREINAMENTOS</option>
                                <option value="DESPESAS_COM_VIAGENS">DESPESAS_COM_VIAGENS</option>
                                <option value="FESTAS_PROMOCOES">FESTAS_PROMOCOES</option>
                                <option value="FRETES_CARRETOS">FRETES_CARRETOS</option>
                                <option value="INFORMATICA">INFORMATICA</option>
                                <option value="INSTRUMENTOS_MUSICAIS">INSTRUMENTOS_MUSICAIS</option>
                                <option value="LICENCIAMENTOS">LICENCIAMENTOS</option>
                                <option value="LIMPEZA">LIMPEZA</option>
                                <option value="MAQUINAS_APARELHOS_EQUIPAMENTOS">MAQUINAS_APARELHOS_EQUIPAMENTOS</option>
                                <option value="MATERIAL_CONSUMO">MATERIAL_CONSUMO</option>
                                <option value="MATERIAL_DIDATICO_CEP">MATERIAL_DIDATICO_CEP</option>
                                <option value="MATERIAL_DIDATICO_ESCOLAR">MATERIAL_DIDATICO_ESCOLAR</option>
                                <option value="MATERIAL_EXPEDIENTE">MATERIAL_EXPEDIENTE</option>
                                <option value="MULTAS_DETRAN">MULTAS_DETRAN</option>
                                <option value="PROMOCOES_EVENTOS">PROMOCOES_EVENTOS</option>
                                <option value="PROPAGANDA_PUBLICIDADE">PROPAGANDA_PUBLICIDADE</option>
                                <option value="REMEDIOS_MEDICAMENTOS">REMEDIOS_MEDICAMENTOS</option>
                                <option value="REPRODUCOES_GRAFICAS">REPRODUCOES_GRAFICAS</option>
                                <option value="SEGURO_ADOLESCENTES">SEGURO_ADOLESCENTES</option>
                                <option value="SEGURO_VEICULOS_PREDIAL">SEGURO_VEICULOS_PREDIAL</option>
                            </select>
                        </td>
                        <td><input type="number"  value=" <?php if (isset($dados['preco3'])){echo $dados['preco3'];}?>" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni3" ></td>
                        <td class="totalValue" name="vt3">0.00</td>
                    </tr>

                    <tr>
                        <td><input type="text" value=" <?php if (isset($dados['uni4'])){echo $dados['uni4'];}?>" class="unit" name="uni4" ></td>
                        <td><input type="number" value=" <?php if (isset($dados['quant4'])){echo $dados['quant4'];}?>" class="quantity" oninput="updateTotal(this)" name="quant4" ></td>
                        <td><input type="text" value=" <?php if (isset($dados['prod4'])){echo $dados['prod4'];}?>" class="description" name="desc4" ></td>
                        <td>
                            <select class="span12" id="a" name="setor4">
                                <option  value="<?php if (isset($dados['desp4'])){echo $dados['desp4'];}?>" ><?php if (isset($dados['desp4'])){echo $dados['desp4'];}?></option>
                                <option value="">Selecionar</option>
                                <option value="ALIMENTACAO">ALIMENTACAO</option>
                                <option value="VESTUARIO">VESTUARIO</option>
                                <option value="ASSISTENCIA_SOCIAL">ESP_CULTURAL</option>
                                <option value=" BRINDES"> BRINDES</option>
                                <option value="COMBUSTIVEIS">COMBUSTIVEIS</option>
                                <option value="COMPUTADORES_PERIFERICOS">COMPUTADORES_PERIFERICOS</option>
                                <option value="CONSERTO_VEICULO">CONSERTO_VEICULO</option>
                                <option value="CONSERTOS_REPAROS_PREDIAL">CONSERTOS_REPAROS_PREDIAL</option>
                                <option value="CORREIO">CORREIO</option>
                                <option value="CURSOS_TREINAMENTOS">CURSOS_TREINAMENTOS</option>
                                <option value="DESPESAS_COM_VIAGENS">DESPESAS_COM_VIAGENS</option>
                                <option value="FESTAS_PROMOCOES">FESTAS_PROMOCOES</option>
                                <option value="FRETES_CARRETOS">FRETES_CARRETOS</option>
                                <option value="INFORMATICA">INFORMATICA</option>
                                <option value="INSTRUMENTOS_MUSICAIS">INSTRUMENTOS_MUSICAIS</option>
                                <option value="LICENCIAMENTOS">LICENCIAMENTOS</option>
                                <option value="LIMPEZA">LIMPEZA</option>
                                <option value="MAQUINAS_APARELHOS_EQUIPAMENTOS">MAQUINAS_APARELHOS_EQUIPAMENTOS</option>
                                <option value="MATERIAL_CONSUMO">MATERIAL_CONSUMO</option>
                                <option value="MATERIAL_DIDATICO_CEP">MATERIAL_DIDATICO_CEP</option>
                                <option value="MATERIAL_DIDATICO_ESCOLAR">MATERIAL_DIDATICO_ESCOLAR</option>
                                <option value="MATERIAL_EXPEDIENTE">MATERIAL_EXPEDIENTE</option>
                                <option value="MULTAS_DETRAN">MULTAS_DETRAN</option>
                                <option value="PROMOCOES_EVENTOS">PROMOCOES_EVENTOS</option>
                                <option value="PROPAGANDA_PUBLICIDADE">PROPAGANDA_PUBLICIDADE</option>
                                <option value="REMEDIOS_MEDICAMENTOS">REMEDIOS_MEDICAMENTOS</option>
                                <option value="REPRODUCOES_GRAFICAS">REPRODUCOES_GRAFICAS</option>
                                <option value="SEGURO_ADOLESCENTES">SEGURO_ADOLESCENTES</option>
                                <option value="SEGURO_VEICULOS_PREDIAL">SEGURO_VEICULOS_PREDIAL</option>
                            </select>
                        </td>
                        <td>
                            <input type="number" value=" <?php if (isset($dados['preco4'])){echo $dados['preco4'];}?>" class="unitPrice" step="0.01"oninput="updateTotal(this)"   name="precUni4">

                        </td>
                        <td class="totalValue" >0.00</td>

                    </tr>
                    </tbody>
                </table>

                <th><b>Valor Geral</b></th>
                <th><input placeholder="00,00" type="number" name="valorTotal" value=" <?php if (isset($dados['total'])){echo $dados['total'];}?>" class="Value" id="valor-Total" readonly></th>
                <table class="table" >

                    <thead>
                    <tr>
                        <th><b>Requisitante:</b> <?php ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th><b>Coordenador:</b>
                            <select id="a" name="assiCoord" required>
                                <option value="">Selecionar</option>
                            </select>
                        </th>
                    </tr>

                    <tr>
                        <th><b>Direção:</b>

                        </th>
                    </tr>
                    </thead>


                    <button id="button" type="submit">Enviar</button>
                    <span></span>
                    </form>
                </table>
            </section>
        </div>
    </main>
    <script>
        function updateTotal(element) {
            const row = element.parentNode.parentNode;
            const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
            const unitPrice = parseFloat(row.querySelector('.unitPrice').value.replaceAll("R$ ", "").replaceAll(".", ",").replaceAll(",", ".")) || 0;
            const totalValue = row.querySelector('.totalValue');
            const total = (quantity * unitPrice).toFixed(2);
            totalValue.textContent = isNaN(total) ? '0.00' : total;
            updateGrandTotal();
        }

        function updateGrandTotal() {
            const totalCells = document.querySelectorAll('.totalValue');
            let grandTotal = 0;
            totalCells.forEach(cell => {
                grandTotal += parseFloat(cell.textContent) || 0;
            });
            document.getElementById('valor-Total').value = grandTotal.toFixed(2);
        }



        // Para o acrecimo de um botao de adicionar colunas


        // document.getElementById('addInput').addEventListener('click', function() {
        // const newRow = document.createElement('tr');
        // newRow.innerHTML = `
        // <td><input type="text" class="unit" name=""></td>
        // <td><input type="number" class="quantity" oninput="updateTotal(this)"name=""></td>
        // <td><input type="text" class="description"name=""></td>
        // <td>
        //     <select class="span12" name="dis">
        //         <option value="Selecionar">Selecionar</option>
        //         <option value="INFANTIL">INFANTIL</option>
        //                 <option value="ESCOLA">ESCOLA</option>
        //                 <option value="ESP_CULTURAL">ESP_CULTURAL</option>
        //                 <option value=" OFICINAS_ESPORTIVAS"> OFICINAS_ESPORTIVAS</option>
        //                 <option value="OFICINAS_CULTURAIS">OFICINAS_CULTURAIS</option>
        //                 <option value="LABORATORIOS">LABORATORIOS</option>
        //                 <option value="PSICOSSOCIAL">PSICOSSOCIAL</option>
        //                 <option value="RECURSOS">RECURSOS</option>
        //                 <option value="RELACIONAMENTO">RELACIONAMENTO</option>
        //                 <option value="COZINHA">COZINHA</option>
        //                 <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
        //                 <option value="TRANSPORTE">TRANSPORTE</option>
        //                 <option value="ALMOXARIFADO">ALMOXARIFADO</option>
        //                 <option value="RH">RH</option>
        //     </select>
        // </td>
        // <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)"name=""></td>
        // <td class="totalValue">0.00</td>
        // <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remover</button></td>
        // `;
        // document.getElementById('tableBody').appendChild(newRow);
        // });

        function removeRow(button) {
            button.parentNode.parentNode.remove();
            updateGrandTotal();
        }

        $(document).ready(function() {
            $(".unitPrice, #valor-Total").maskMoney({
                prefix: 'R$ ',
                allowNegative: false,
                thousands: '.',
                decimal: ','
            });
        });
    </script>

    </body>
    <!--        <script src="../../javaScript/enviar.js"></script>-->
    <script src="../../javaScript/mobile-navbar.js"></script>


    </html>
<?php } else {
    header("Location:../logout.php");
    die();
}

