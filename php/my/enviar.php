<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['admin'])&&(isset($_SESSION['usuario']))){
    include('../conexao.php');
    require('../menu.php');

    $ID = intval($_GET['ID']);
    $sql_usuarios = "SELECT * FROM usuarios WHERE ID = '$ID'";
    $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();

    $nome = $usuario['nome'];

    if(count($_POST) > 0){

        $fornece = $_POST['fornece'];
        $setor = $_POST['setor'];
        $assi1 = $nome;

        $erro = false;

        if(empty($fornece)){
            $erro = "Preencha o Fornecedor!";
        }

        else if(isset($erro)){
            $sql_code = "INSERT INTO ordens(ID, fornece, setor, requisitante, coordenador, direcao,'Não Informado',NOW())";
            $deu_certo = $mysql->query($sql_code) or die($mysql->error);
        }

    }
    ?>

    <?php
} else {
    header("Location:../logout.php");
    die();
}
?>

<?php
if(isset($erro)){
    echo $erro;
}
if(isset($deu_certo)){
    echo "Enviado com Sucesso!";
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
    <script src="/compra/javaScript/jquery-3.7.1.min.js"></script>
    <script src="/compra/javaScript/jquery.maskMoney.js"></script>
    <title>Projeto</title>


</head>

<body onload="preencherData()">

<?php if ($_SESSION['usuario']) {
    echo $top;
} else if ($_SESSION['admin']) {
    echo $top_adm;
} ?>

<footer style="height: 84vh;">
    <div class="container-fluid p-5 text-center">
        <h1>ORDEM DE COMPRA</h1>
    </div>
    <div class="container mt-3">
        <section id="c">
            <form action="" method="post">
                <table class="table">
                    <thead>

                    <tr>
                        <th for="data"><b>Data:</b>
                        <input type="text" id="data" name="data" readonly></th>
                    </tr>

                            <tr>
                                <th for="data"><b>Urgência:</b>
                                <select class="urgencia" name="Urg" id="a">
                                    <option value="Selecionar">Selecionar</option>
                                    <option value="Baixa">Baixa (Até 2 semanas)</option>
                                    <option value="Media">Média (Até 1 semana)</option>
                                    <option value="Alta">Alta (Até 3 dias)</option>
                                    <option value="Urgente">Urgente (Hoje)</option>
                                </select>
                                </th>
                            </tr>

                    <tr>
                        <th><b>Fornecedor:</b><input id="a" name="fornece" type="text" required></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th><b>Setor:</b>
                            <select class="span12" name="setor" id="a" required>
                                <option value="Selecionar">Selecionar</option>
                                <option value="Cef">Cef</option>
                                <option value="Cozinha">Cozinha</option>
                                <option value="Administração">Administração</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Financeiro">Financeiro</option>
                                <option value="Cias">Cias</option>
                                <option value="Clic">Clic</option>
                                <option value="Cep">Cep</option>
                            </select>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>
                            <!-- Contador de linhas adicionadas -->
                            <span style="color: brown" id="linhaCount" class="linha-count">4 Colunas adicionadas</span>
                        </th>
                    </tr>
                    </thead>
                </table>

                <table method="post"  class="table table-hover">
                    <thead>
                    <tr>
                        <th>Unidade:</th>
                        <th>Quantidade:</th>
                        <th>Descrição De Produto</th>
                        <th>Tipo De Despesa</th>
                        <th>Preço Da Unidade</th>
                        <th>Valor Total:</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="tableBody">
                    <tr>
                            <td>
                                <select class="span12" name="unid" id="a" required>
                                    <option value="Selecionar">Selecionar</option>
                                    <option value="dz">Duzia</option>
                                    <option value="cart">Cartela</option>
                                    <option value="lt">Litro</option>
                                    <option value="sc">Saco</option>
                                    <option value="cx">Caixa</option>
                                    <option value="unid">Unidade</option>
                                    <option value="met">Metro</option>
                                    <option value="par">Par</option>
                                    <option value="pt">Pacote</option>
                                    <option value="rl">Rolo</option>
                                    <option value="kg">Kilograma</option>
                                    <option value="g">Grama</option>
                                    <option value="ml">Mililitro</option>
                                </select>
                            </td>
                            <td><input type="number" class="quantity" oninput="updateTotal(this)"></td>
                            <td><textarea class="description"></textarea></td>
                        <td>
                            <select class="span12" name="dis1" id="a">
                                <option value="Selecionar">Selecionar</option>
                                <option value="Cef">Cef</option>
                                <option value="Cozinha">Cozinha</option>
                                <option value="Administração">Administração</option>
                                <option value="Cep">Cep</option>
                            </select>
                        </td>
                        <td><input type="number" class="unitPrice" step="0.01" oninput="updateTotal(this)"></td>
                        <td class="totalValue" id="valor">0.00</td>
                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">-</button></td>
                    </tr>

                    <tr>
                       <td>
                               <select class="span12" name="unid" id="a" required>
                                   <option value="Selecionar">Selecionar</option>
                                   <option value="dz">Duzia</option>
                                   <option value="cart">Cartela</option>
                                   <option value="lt">Litro</option>
                                   <option value="sc">Saco</option>
                                   <option value="cx">Caixa</option>
                                   <option value="unid">Unidade</option>
                                   <option value="met">Metro</option>
                                   <option value="par">Par</option>
                                   <option value="pt">Pacote</option>
                                   <option value="rl">Rolo</option>
                                   <option value="kg">Kilograma</option>
                                   <option value="g">Grama</option>
                                   <option value="ml">Mililitro</option>
                               </select>
                           </td>
                            <td><input type="number" class="quantity" oninput="updateTotal(this)"></td>
                            <td><textarea class="description"></textarea></td>
                        <td>
                            <select class="span12" name="dis2" id="a">
                                <option value="Selecionar">Selecionar</option>
                                <option value="Cef">Cef</option>
                                <option value="Cozinha">Cozinha</option>
                                <option value="Administração">Administração</option>
                                <option value="Cep">Cep</option>
                            </select>
                        </td>
                        <td><input type="number" class="unitPrice" step="0.01" oninput="updateTotal(this)"></td>
                        <td class="totalValue" id="valor">0.00</td>
                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">-</button></td>
                    </tr>

                    <tr>
                            <td>
                                <select class="span12" name="unid" id="a" required>
                                    <option value="Selecionar">Selecionar</option>
                                    <option value="dz">Duzia</option>
                                    <option value="cart">Cartela</option>
                                    <option value="lt">Litro</option>
                                    <option value="sc">Saco</option>
                                    <option value="cx">Caixa</option>
                                    <option value="unid">Unidade</option>
                                    <option value="met">Metro</option>
                                    <option value="par">Par</option>
                                    <option value="pt">Pacote</option>
                                    <option value="rl">Rolo</option>
                                    <option value="kg">Kilograma</option>
                                    <option value="g">Grama</option>
                                    <option value="ml">Mililitro</option>
                                </select>
                            </td>
                            <td><input type="number" class="quantity" oninput="updateTotal(this)"></td>
                            <td><textarea class="description"></textarea></td>
                        <td>
                            <select class="span12" name="dis3" id="a">
                                <option value="Selecionar">Selecionar</option>
                                <option value="Cef">Cef</option>
                                <option value="Cozinha">Cozinha</option>
                                <option value="Administração">Administração</option>
                                <option value="Cep">Cep</option>
                            </select>
                        </td>
                        <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)"></td>
                        <td class="totalValue" id="valor">0.00</td>
                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">-</button></td>
                    </tr>

                    <tr>
                            <td>
                                <select class="span12" name="unid" id="a" required>
                                    <option value="Selecionar">Selecionar</option>
                                    <option value="dz">Duzia</option>
                                    <option value="cart">Cartela</option>
                                    <option value="lt">Litro</option>
                                    <option value="sc">Saco</option>
                                    <option value="cx">Caixa</option>
                                    <option value="unid">Unidade</option>
                                    <option value="met">Metro</option>
                                    <option value="par">Par</option>
                                    <option value="pt">Pacote</option>
                                    <option value="rl">Rolo</option>
                                    <option value="kg">Kilograma</option>
                                    <option value="g">Grama</option>
                                    <option value="ml">Mililitro</option>
                                </select>
                            </td>
                             <td><input type="number" class="quantity" oninput="updateTotal(this)"></td>
                             <td><textarea class="description"></textarea></td>
                        <td>
                            <select class="span12" name="dis4" id="a">
                                <option value="Selecionar">Selecionar</option>
                                <option value="Cef">Cef</option>
                                <option value="Cozinha">Cozinha</option>
                                <option value="Administração">Administração</option>
                                <option value="Cep">Cep</option>
                            </select>
                        </td>
                        <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)"></td>
                        <td class="totalValue" id="valor">0.00</td>
                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">-</button></td>
                    </tr>
                    </tbody>
                </table>

                    <div class="add-button-container">
                        <button type="button" id="addInput" class="btn btn-primary me-5 ">+</button>
                                        <button id="button" type="submit" class="btn btn-secondary">Enviar</button>
                    <span></span>
                    </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th><b>Valor Geral</b>
                        <input placeholder="00,00" type="text" class="Value" id="valor-Total" readonly></th>
                        
                    </tr>
                    <tr>
                        <th><b>Requisitante:</b> <input id="a" name="assi1" value="<?php echo $usuario['nome']; ?>" readonly type="text"></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>

                    <tr>
                        <th><b>Coordenador:</b>
                            <select id="a">
                                <option value="Selecionar">Marcelo</option>
                                <option value="Cef">Guilherme</option>
                                <option value="Cozinha">Nei</option>
                                <option value="Administração">Lacir</option>
                            </select>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                            <th><b>Aprovador:</b>
                                <select id="a">
                                    <option value="Selecionar">Marcelo</option>
                                </select>
                            </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                </table>


            </form>
        </section>
    </div>
</footer>

<script src="../../javaScript/mobile-navbar.js"></script>
<script src="../../javaScript/enviar.js"></script>

</body>
</html>
