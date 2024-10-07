<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logobranca.jpg">

    <script src="../javaScript/lateral.js" defer></script>
    <script src="../javaScript/mobile-navbar.js"></script>
    <script src="../javaScript/alertas.js"></script>



    <title>Visualizar Ordem</title>
    
</head>
<body>
<nav class="main-menu">
    <?php              
        include '../php/menu.php';
        echo $top; 
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
                        <th for="data"><b>Urgência:</b>
                            <select class="urgencia" name="Urg" id="a">
                                <option value=""></option>

                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th><b>Fornecedor:</b><input id="a" value="" name="fornece" type="text" readonly required></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th><b>Setor:</b> <select class="span12" name="setor" id="a" readonly required>
                                    <option value=""></option>
                            </select></th>
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
                <td><input type="text" class="unit" name="uni1" value=""readonly></td>
                <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant1" value=""readonly></td>
                <td><input type="text"  class="description"name="desc1" value="" readonly></td>
                <td>
                    <select class="span12" name="setor1" id="a" readonly>
                            <option value=""></option>
                    </select>
                </td>
                <td><input type="text"  oninput="updateTotal(this)" name="precUni1" value=""readonly></td>
                <td class="totalValue" id="valor"> </td>
            </tr>

               <tr>
                   <td><input type="text" class="unit" name="uni2" value=""readonly></td>
                   <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant2"value=""readonly></td>
                   <td><input type="text"  class="description"name="desc1" value="" readonly></td>
                   <td>
                       <select class="span12" name="setor1" id="a" readonly>
                           <option value=""></option>
                       </select>
                   </td>
                   <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni2" value=""readonly></td>
                   <td class="totalValue" id="valor"></td>
               </tr>
                <tr>
                    <td><input type="text" class="unit" name="uni3" value=""readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant3"value=""readonly></td>
                    <td><input type="text"  class="description"name="desc3" value="" readonly></td>
                    <td>
                        <select class="span12" name="setor3" id="a" readonly>
                            <option value=""></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni3" value=""readonly></td>
                    <td class="totalValue" id="valor"></td>
                </tr>
                <tr>
                    <td><input type="text" class="unit" name="uni4" value=""readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant4"value=""readonly></td>
                    <td><input type="text"  class="description"name="desc1" value="" readonly></td>
                    <td>
                        <select class="span12" name="setor4" id="a" readonly>
                            <option value=""></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni4" value=""readonly></td>
                    <td class="totalValue" id="valor"></td>
                </tr>  
            <th><b>Valor Geral</b></th>
            <th><input placeholder="00,00" type="text" name="valorTotal" value="" class="Value" id="valor-Total" readonly></th>
            <th><img src="" alt=""></th>
        </table>
        <table class="table">
            <thead>
            <tr>
                <th>
                    <b>Requisitante:</b>
                </th>

            </tr>
            <tr>
                <th>
                    <b>Coordenador:</b>    
                </th>
            </tr>
                    <tr>
                        <th>
                            <b>Aprovador:</b>
                            <select id="a" name="assiDi"></select>
                        </th>    
                    </tr>
                
                </thead>
            </form>
        </table>
    </select> 
                <th>
                    <b>Projeto:</b>
                    <b>
                        <button type="submit" name="Status" value="2">Encaminhar</button>
                        <button type="submit" name="Status" value="7">Não Possui Projeto</button>
                    </b>
                </th>               
        <div class="btn_projeto">
            <button class="buttons"  name="Status" value="1" type="submit">Encaminhar</button>
            <button class="buttons"  name="Status" value="3" type="submit">Redirecionar</button>                    
            <button class="buttons"  name="Status" value="4" type="submit">Autorizar</button>
            <button class="buttons"  name="status" value="" type="submit">Rejeitar</button>
        </div>
    <button id="button"   onclick="alerta()">Salvar</button>
    </section>
    </div>
    </main>
</html>