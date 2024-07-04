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
            $sql_code = "INSERT INTO `ordens`(`ID`, `fornece`, `setor`, `requisitante`, `coordenador`, `direcao`,'Não Informado',NOW())";
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
    
    <style>
        @media (max-width: 768px) {
            .table th, .table td {
                display: block;
                width: 100%;
            }
            .table thead {
                display: none;
            }
            .table tbody tr {
                margin-bottom: 1rem;
                display: block;
            }
        }

    </style>
</head>

<body>

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
                        <td><input type="text" class="unit"></td>
                        <td><input type="number" class="quantity" oninput="updateTotal(this)"></td>
                        <td><input type="text" class="description"></td>
                        <td>
                            <select class="span12" name="dis1" id="a">
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
                        <td><input type="text" class="unit"></td>
                        <td><input type="number" class="quantity" oninput="updateTotal(this)"></td>
                        <td><input type="text" class="description"></td>
                        <td>
                            <select class="span12" name="dis1" id="a">
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
                        <td><input type="text" class="unit"></td>
                        <td><input type="number" class="quantity" oninput="updateTotal(this)"></td>
                        <td><input type="text" class="description"></td>
                        <td>
                            <select class="span12" name="dis1" id="a">
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
                        <td><input type="text" class="unit"></td>
                        <td><input type="number" class="quantity" oninput="updateTotal(this)"></td>
                        <td><input type="text" class="description"></td>
                        <td>
                            <select class="span12" name="dis1" id="a">
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
                    <button  type="button" id="addInput" class="btn btn-primary me-5 ">+</button>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th><b>Valor Geral</b></th>
                        <th><input placeholder="00,00" type="text" class="Value" id="valor-Total" readonly></th>
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
                        <th><b>Direção:</b>
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

                <button id="button" type="submit">Enviar</button>
                <span></span>
            </form>
        </section>
    </div>
</footer>

<script>
    function updateTotal(element) {
        const row = element.parentNode.parentNode;
        const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
        const unitPrice = parseFloat(row.querySelector('.unitPrice').value.replaceAll("R$ ", "").replaceAll(".", "").replaceAll(",", ".")) || 0;
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

    document.getElementById('addInput').addEventListener('click', function() {
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><input type="text" class="unit"></td>
            <td><input type="number" class="quantity" oninput="updateTotal(this)"></td>
            <td><input type="text" class="description"></td>
            <td>
                <select class="span12" name="dis">
                    <option value="Selecionar">Selecionar</option>
                    <option value="Cef">Cef</option>
                    <option value="Cozinha">Cozinha</option>
                    <option value="Administração">Administração</option>
                    <option value="Cep">Cep</option>
                </select>
            </td>
            <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)"></td>
            <td class="totalValue">0.00</td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remover</button></td>
        `;
        document.getElementById('tableBody').appendChild(newRow);
    });

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
<script src="../../javaScript/mobile-navbar.js"></script>
<script src="../../javaScript/add.js"></script>

</body>
</html>
