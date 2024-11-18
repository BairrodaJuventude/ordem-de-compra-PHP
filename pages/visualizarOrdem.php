<?php

    session_start();

    require_once '../php/OrdemDeCompra/ServiceOrdemDeCompra.php';
    require_once '../php/Usuario/ServiceUsuarios.php';
    pegaId();
    include '../php/Configuracao/conexao.php';
    include '../php/menu.php';


    if (!isset($_GET['id'])){
        die("Identificador Não Encontrado");
    }
    $ordem = new OrdemDeCompra(pegaIdCriptOrdem($_GET['id']), Null, Null,false);


    $requisitante = new usuarios($ordem->SelecionaOrdem()[0]['requisitante'], null);
    $coordenador = new usuarios($ordem->SelecionaOrdem()[0]['coordenador'], null);
    if ($ordem->SelecionaOrdem()[0]['direcao'] != 0)
    {
        $aprovador = new usuarios($ordem->SelecionaOrdem()[0]['direcao'], null);
    }
    if (count($_POST)>0)
    {
        if(!empty($_POST['Status']) && empty($_POST['projeto'])){
            segueRota($_POST['Status'], $ordem->SelecionaOrdem()[0]['ID'], null);
        }elseif (!empty($_POST['Status']) && !empty($_POST['projeto'])){
            segueRota($_POST['Status'], $ordem->SelecionaOrdem()[0]['ID'], $_POST['projeto']);

        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logobranca.jpg">
    <link rel="stylesheet" href="../css/lateral.css">
    <script src="../javaScript/lateral.js" defer></script>


    <title>Visualiza Ordem</title>

</head>
<body>
<nav class="main-menu">
        <?php

        echo $top;

        echo $nome;

        ?>

</nav>
<main>
    <div class="container-fluid p-5 text-center ">
        <h1>ORDEM DE COMPRA</h1>
    </div>
    <div class="container mt-3">
    <section id="c">
        <table class="table">
            <thead>
            <tr>
                <form action="" method="post">
                    <tr>
                        <th for="data">
                            <b>Urgência: </b><?php echo $ordem->SelecionaOrdem()[0]['Urgencia']; ?>
                        </th>
                    </tr>
                    <tr>
                        <th><b>Fornecedor: </b><input id="a" value="<?php echo $ordem->SelecionaOrdem()[0]['fornece']; ?>" name="fornece" type="text" readonly required></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th><b>Setor:</b> <?php echo $ordem->SelecionaOrdem()[0]['setor']; ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
            </thead>
        </table>
        <table method="post" border="1" class="table table-hover">
            <tr>
                <th>Unidade:</th>
                <th>Quantidade:</th>
                <th>Descrição De Produto</th>
                <th>Tipo De Despesa</th>
                <th>Preço Da Unidade</th>
                <th>Valor Total:</th>
            </tr>
            <tr>
                <td><input type="text" class="unit" name="uni1" value="<?php echo $ordem->SelecionaOrdem()[0]['uni1']; ?>"readonly></td>
                <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant1" value="<?php echo $ordem->SelecionaOrdem()[0]['quant1']; ?>"readonly></td>
                <td><input type="text"  class="description"name="desc1" value="<?php echo $ordem->SelecionaOrdem()[0]['prod1']; ?>" readonly></td>
                <td>
                    <?php echo $ordem->SelecionaOrdem()[0]['desp1']; ?>
                </td>
                <td><input type="text"  oninput="updateTotal(this)" name="precUni1" value=" <?php echo $ordem->SelecionaOrdem()[0]['preco1']; ?>"readonly></td>
                <td class="totalValue" id="valor"> </td>
            </tr>

               <tr>
                   <td><input type="text" class="unit" name="uni2" value="<?php echo $ordem->SelecionaOrdem()[0]['uni2']; ?>"readonly></td>
                   <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant2"value="<?php echo $ordem->SelecionaOrdem()[0]['quant2']; ?>"readonly></td>
                   <td><input type="text"  class="description"name="desc1" value="<?php echo $ordem->SelecionaOrdem()[0]['prod2']; ?>" readonly></td>
                   <td>
                       <?php echo $ordem->SelecionaOrdem()[0]['desp2']; ?>
                   </td>
                   <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni2" value="<?php echo $ordem->SelecionaOrdem()[0]['preco2']; ?>"readonly></td>
                   <td class="totalValue" id="valor"></td>
               </tr>
                <tr>
                    <td><input type="text" class="unit" name="uni3" value="<?php echo $ordem->SelecionaOrdem()[0]['uni3']; ?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant3"value="<?php echo $ordem->SelecionaOrdem()[0]['quant3']; ?>"readonly></td>
                    <td><input type="text"  class="description"name="desc3" value="<?php echo $ordem->SelecionaOrdem()[0]['prod3']; ?>" readonly></td>
                    <td>
                        <?php echo $ordem->SelecionaOrdem()[0]['desp3']; ?>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni3" value="<?php echo $ordem->SelecionaOrdem()[0]['preco3']; ?>"readonly></td>
                    <td class="totalValue" id="valor"></td>
                </tr>
                <tr>
                    <td><input type="text" class="unit" name="uni4" value="<?php echo $ordem->SelecionaOrdem()[0]['uni4']; ?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant4"value="<?php echo $ordem->SelecionaOrdem()[0]['quant4']; ?>"readonly></td>
                    <td><input type="text"  class="description"name="desc1" value="<?php echo $ordem->SelecionaOrdem()[0]['prod4']; ?>" readonly></td>
                    <td>
                        <?php echo $ordem->SelecionaOrdem()[0]['desp4']; ?>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni4" value="<?php echo $ordem->SelecionaOrdem()[0]['preco4']; ?>"readonly></td>
                    <td class="totalValue" id="valor"></td>
                </tr>  
            <th><b>Valor Geral</b></th>
            <th><input placeholder="00,00" type="text" name="valorTotal" value="<?php echo $ordem->SelecionaOrdem()[0]['total']; ?>" class="Value" id="valor-Total" readonly></th>
            <th></th>
        </table>
        <table class="table">
            <thead>

            <th><b>Projeto: </b> <?php if ($ordem->SelecionaOrdem()[0]['id_projeto'] != null){$projeto = new projeto($ordem->SelecionaOrdem()[0]['id_projeto'], null); echo $projeto->SelecionaProjeto()[0]['nome']; } ?></th>

            <?php if (is_array(verificaTokenMostraBotao(pegaId(), $ordem->SelecionaOrdem()[0]['ID']))) {?>
                    <tr>
                        <?php if (verificaTokenMostraBotao(pegaId(), $ordem->SelecionaOrdem()[0]['ID'])[0] == "Nenhum Projeto Com Este Valor"){ ?>
                            <td>
                                <button id='button' style='background-color: #f00; color: white;' name='Status' value='7' type='submit'>Não Possui Projeto</button>
                            </td>
                        <?php }else{ ?>
                            <td>
                                <b>Projeto:</b>
                                <select name='projeto' id="a" class="span12" ><option value="">Selecione</option>
                                    <?php for ($i=0;$i<count(verificaTokenMostraBotao(pegaId(), $ordem->SelecionaOrdem()[0]['ID']));$i++){?>
                                        <option value="<?php echo verificaTokenMostraBotao(pegaId(), $ordem->SelecionaOrdem()[0]['ID'])[$i]['ID']; ?>"><?php echo verificaTokenMostraBotao(pegaId(), $ordem->SelecionaOrdem()[0]['ID'])[$i]['nome'].": ". verificaTokenMostraBotao(pegaId(), $ordem->SelecionaOrdem()[0]['ID'])[$i]['valor']; ?></option>
                                    <?php }?>
                                </select>
                            </td>
                            <td>
                                <button id='button' style='background-color: #0000ff; color: white;' name='Status' value='2' type='submit'>Encaminhar</button>
                                <button id='button' style='background-color: #f00; color: white;' name='Status' value='7' type='submit'>Não Possui Projeto</button>
                            </td>
                        <?php } ?>
                    </tr>

                <?php }else{ echo verificaTokenMostraBotao(pegaId(), $ordem->SelecionaOrdem()[0]['ID']);} ?>

                <tr>
                    <th>
                        <b>Requisitante: <?php echo $requisitante->SelecionaUsuario()[0]['nome']; ?></b>
                    </th>

                </tr>
                <tr>
                    <th>
                        <b>Coordenador: <?php echo $coordenador->SelecionaUsuario()[0]['nome']; ?></b>
                    </th>
                </tr>
                        <tr>
                            <th>
                                <b>Aprovador: <?php if ($ordem->SelecionaOrdem()[0]['direcao'] != 0){ echo $aprovador->SelecionaUsuario()[0]['nome']; }?></b>

                            </th>
                        </tr>




            </thead>
            </form>
        </table>
    </section>
<!--        <div class="btn_projeto">-->
<!--            <button class="buttons"  name="Status" value="1" type="submit">Encaminhar</button>-->
<!--            <button class="buttons"  name="Status" value="3" type="submit">Redirecionar</button>                    -->
<!--            <button class="buttons"  name="Status" value="4" type="submit">Autorizar</button>-->
<!--            <button class="buttons"  name="status" value="" type="submit">Rejeitar</button>-->
<!--        </div>-->
<!--    <button id="button"   onclick="alerta()">Salvar</button>-->
<!--    </section>-->
<!--    </div>-->
    </main>
</html>