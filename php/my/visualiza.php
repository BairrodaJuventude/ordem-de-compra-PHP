<?php
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['admin']) || isset($_SESSION['usuario'])){
    include('../conexao.php');
    require('../menu.php');

    if(isset($_SESSION['admin'])&&!isset($_SESSION['usuario'])) {
        $ID =$_SESSION['admin'];
    }else if(!isset($_SESSION['admin'])&&isset($_SESSION['usuario'])){
        $ID = $_SESSION['usuario'];
    }
    $id_ordem = intval($_GET['idme']);

    $sql_usuarios = "SELECT * FROM usuarios WHERE ID = '$ID'";
    $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();

    $nome = $usuario['nome'];

    if(count($_POST) > 0){
        $Status = $_POST['Status'];
        $erro = false;
        
        if(empty($erro) && ($usuario['token']==7 ||$usuario['token2']==7 )){
            $sql_code = "UPDATE `ordens` SET coordenador = '$nome', Status = '$Status' WHERE ID = '$id_ordem'";
            $deu_certo = $mysql->query($sql_code) or die($mysql->error);
        }
    }

    $sql_ordem = "SELECT * FROM ordens WHERE ID = '$id_ordem'";
    $query_ordem = $mysql->query($sql_ordem) or die($mysql->error);
    $ordens = $query_ordem->fetch_assoc();

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

<?php if(isset($_SESSION['usuario'])){ echo $top;}else if(isset($_SESSION['admin'])){echo $top_adm;}?>

<main>
    <div class="container-fluid p-5 text-center ">
        <h1>ORDEM DE COMPRA</h1>
    </div>
    <div class="container mt-3">
        <section id="c">
            <form action="" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th><b>Fornecedor:</b><input id="a" value="<?php echo $ordens['fornece'];?>" name="fornece" readonly type="text"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th><b>Setor:</b><input id="a" value="<?php echo $ordens['setor'];?>" name="setor" readonly type="text"></th>
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
                        <td><input type="text" class="unit" value="<?php echo $ordens['uni1'];?>" readonly></td>
                        <td><input type="number" class="quantity" value="<?php echo $ordens['quant1'];?>" readonly oninput="updateTotal(this)"></td>
                        <td><input type="text" class="description" value="<?php echo $ordens['prod1'];?>" readonly></td>
                        <td>
                            <select class="span12" name="dis1" id="a" readonly>
                                <option value="Selecionar">Selecionar</option>
                                <option value="Cef">Cef</option>
                                <option value="Cozinha">Cozinha</option>
                                <option value="Administração">Administração</option>
                                <option value="Cep">Cep</option>
                            </select>
                        </td>    
                        <td><input type="text" class="unitPrice" value="<?php echo $ordens['preco1'];?>" readonly step="0.01" oninput="updateTotal(this)"></td>
                        <td class="totalValue"></td>
                    </tr>
                  
                    <tr>
                        <th><b>Valor Geral</b></th>
                        <th><input placeholder="00,00" type="text" class="Value" id="valor-Total" readonly></th>
                    </tr>
                </table>

                <table class="table">
                        <thead>
                        <tr>
                            <th><b>Requisitante:</b> <input id="a" name="assi1" value="<?php  $ordens['requisitante']; ?>" readonly type="text"></th>                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th><b>Coordenador:</b>
                                <select id="a" name="Status">
                                    <option value="Em Espera">Em Espera</option>
                                    <option value="Autorizado">Autorizar pelo setor</option>
                                    <option value="Em Espera">Em Espera</option>
                                    <option value="Autorizado">Autorizado a compra</option>
                                    <option value="Autorizado">A caminho</option>
                                    <option value="Autorizado">Concluido</option>
                                </select>
                            </th>
                        </tr>
                        
                    </thead>
                </table>
                <button id="button" type="submit">Enviar</button>
            </form>
            <!-- Botão de editar -->
            <a href="pagina_de_edicao.php?ID=<?php echo $ID; ?>&idme=<?php echo $id; ?>" class="btn btn-primary">Editar</a>
        </section>
    </div>
</main>

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
</script>

</body>
</html>

<?php
} else {
    header("Location:../logout.php");
    die();
}
?>