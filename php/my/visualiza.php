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
        <table class="table">
            <thead>
            <tr>
                <form action="" method="post">
                    <tr>
                        <th><b>Fornecedor:</b><input id="a" value="<?php echo $ordens['fornece'];?>" name="fornece" type="text" readonly required></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th><b>Setor:</b> <select class="span12" name="setor" id="a" readonly required>
                                    <option value="<?php echo $ordens['setor'];?>"><?php echo $ordens['setor'];?></option>
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
                <td><input type="text" class="unit" name="uni1" value="<?php echo $ordens['uni1'];?>"readonly></td>
                <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant1"value="<?php echo $ordens['quant1'];?>"readonly></td>
                <td><input type="text"  class="description"name="desc1" value="<?php echo $ordens['prod1'];?>" readonly></td>
                <td>
                    <select class="span12" name="setor1" id="a" readonly>
                            <option value="<?php echo $ordens['desp1'];?>"><?php echo $ordens['desp1'];?></option>
                    </select>
                </td>
                <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni1" value=" <?php echo $ordens['preco1'];?>"readonly></td>
                <td class="totalValue" id="valor">0.00</td>
            </tr>

            <tr>
                <td><input type="text" class="unit" name="uni2"readonly></td>
                <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant2" readonly></td>
                <td><input type="text" class="description" name="desc2"readonly ></td>
                <td>
                    <select class="span12"  id="a"name="setor2"readonly>
                        <option value="">Selecionar</option>

                            <option value="<?php echo $ordens['setor'];?>"><?php echo $ordens['setor'];?></option>

                    </select>
                </td>
                <td><input type="text" class="unitPrice" step="0.01"  oninput="updateTotal(this)"name="precUni2"readonly ></td>
                <td class="totalValue"  id="valor" name="vt2">0.00</td>
            </tr>

            <tr>
                <td><input type="text" class="unit"name="uni3"readonly ></td>
                <td><input type="number" class="quantity" oninput="updateTotal(this)"name="quant3" readonly></td>
                <td><input type="text" class="description" name="desc3"readonly></td>
                <td>
                    <select class="span12"  id="a"name="setor3" >
                        <option value="">Selecionar</option>

                            <option value="<?php echo $ordens['setor'];?>"><?php echo $ordens['setor'];?></option>

                    </select>
                </td>
                <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni3" ></td>
                <td class="totalValue" name="vt3">0.00</td>
            </tr>

            <tr>
                <td><input type="text" class="unit" name="uni4" ></td>
                <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant4" ></td>
                <td><input type="text" class="description" name="desc4" ></td>
                <td>
                    <select class="span12" id="a" name="setor4">
                        <option value="">Selecionar</option>

                            <option value="<?php echo $ordens['setor'];?>"><?php echo $ordens['setor'];?></option>

                    </select>
                </td>
                <td><input type="text" class="unitPrice" step="0.01" value=""  oninput="updateTotal(this)"name="precUni4" ></td>
                <td class="totalValue" >0.00</td>
            </tr>



            <th><b>Valor Geral</b></th>
            <th><input placeholder="00,00" type="text" name="valorTotal" value="" class="Value" id="valor-Total" readonly></th>
        </table>

        <table class="table">
            <thead>
            <tr>
                <th><b>Requisitante:</b><?php  ?> </th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th><b>Coordenador:</b>
                    <select id="a" name="assiCoord">
                        <?php
                            $id_coor = $ordens['coordenador'];
                            $sql_usuarios_assinatura = "SELECT * FROM usuarios WHERE ID = $id_coor ";
                            $query_usuarios_assinatura = $mysql->query($sql_usuarios_assinatura) or die($mysql->error);
                            $assinatura = $query_usuarios_assinatura->fetch_assoc();
                                ?>
                                <option><?php echo $assinatura['nome'];?></option>



                    </select>
                </th><?php?>
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

    function somarTotais() {
        let somas = 0.0;
        tabela.forEach((e, i)=>{
            const total = e[5];
            if (!e[5]) return;
            somas += total;
        })
        return somas;
    }

    $('#valor-Total').val( somarTotais() )

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

<script src="../../javaScript/mobile-navbar.js"></script>

    </html>

<?php
} else {
    header("Location:../logout.php");
    die();
}
?>