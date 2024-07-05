<?php
if(!isset($_SESSION)){
  session_start();
}
if(isset($_SESSION['admin'])||(isset($_SESSION['usuario']))){
    include('../conexao.php');
    require('../menu.php');
    if(isset($_SESSION['admin'])){
            $ID = $_SESSION['admin'];
    }else{
            $ID = $_SESSION['usuario'];
    }

    $sql_setores = "SELECT * FROM setores";
    $query_setores = $mysql->query($sql_setores) or die($mysql->error);
    $num_setores = $query_setores->num_rows;
    $query_setores2 = $mysql->query($sql_setores) or die($mysql->error);
    $query_setores3 = $mysql->query($sql_setores) or die($mysql->error);
    $query_setores4 = $mysql->query($sql_setores) or die($mysql->error);
    $query_setores5 = $mysql->query($sql_setores) or die($mysql->error);



    $sql_usuarios_assinatura = "SELECT * FROM usuarios WHERE token = '7' ";
    $query_usuarios_assinatura = $mysql->query($sql_usuarios_assinatura) or die($mysql->error);
    $num_assinatura = $query_usuarios_assinatura->num_rows;

    $sql_usuarios = "SELECT * FROM usuarios WHERE ID = '$ID'";
    $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();
    $assi1 = $usuario['ID'];
    if(count($_POST) > 0){
        $assiCoord = $mysql->escape_string($_POST['assiCoord']);
        $fornece = $mysql->escape_string($_POST['fornece']);
        $setor = $mysql->escape_string($_POST['setor']);
        $uni1 = $mysql->escape_string($_POST['uni1']);
        $uni2 = $mysql->escape_string($_POST['uni2']);
        $uni3 = $mysql->escape_string($_POST['uni3']);
        $uni4 = $mysql->escape_string($_POST['uni4']);
        $uni5 = $mysql->escape_string($_POST['uni5']);
        $uni6 = $mysql->escape_string($_POST['uni6']);
        $uni7 = $mysql->escape_string($_POST['uni7']);
        $uni8 = $mysql->escape_string($_POST['uni8']);
        $uni9 = $mysql->escape_string($_POST['uni9']);
        $uni10 = $mysql->escape_string($_POST['uni10']);
        $uni11 = $mysql->escape_string($_POST['uni11']);
        $uni12 = $mysql->escape_string($_POST['uni12']);
        $uni13 = $mysql->escape_string($_POST['uni13']);
        $uni14 = $mysql->escape_string($_POST['uni14']);
        $uni15 = $mysql->escape_string($_POST['uni15']);
        $uni16 = $mysql->escape_string($_POST['uni16']);
        $uni17 = $mysql->escape_string($_POST['uni17']);
        $uni18 = $mysql->escape_string($_POST['uni18']);
        $uni19 = $mysql->escape_string($_POST['uni19']);
        $uni20 = $mysql->escape_string($_POST['uni20']);
        $quant1 = $mysql->escape_string($_POST['quant1']);
        $quant2 = $mysql->escape_string($_POST['quant2']);
        $quant3 = $mysql->escape_string($_POST['quant3']);
        $quant4 = $mysql->escape_string($_POST['quant4']);
        $quant5 = $mysql->escape_string($_POST['quant5']);
        $quant6 = $mysql->escape_string($_POST['quant6']);
        $quant7 = $mysql->escape_string($_POST['quant7']);
        $quant8 = $mysql->escape_string($_POST['quant8']);
        $quant9 = $mysql->escape_string($_POST['quant9']);
        $quant10 = $mysql->escape_string($_POST['quant10']);
        $quant11 = $mysql->escape_string($_POST['quant11']);
        $quant12 = $mysql->escape_string($_POST['quant12']);
        $quant13 = $mysql->escape_string($_POST['quant13']);
        $quant14 = $mysql->escape_string($_POST['quant14']);
        $quant15 = $mysql->escape_string($_POST['quant15']);
        $quant16 = $mysql->escape_string($_POST['quant16']);
        $quant17 = $mysql->escape_string($_POST['quant17']);
        $quant18 = $mysql->escape_string($_POST['quant18']);
        $quant19 = $mysql->escape_string($_POST['quant19']);
        $quant20 = $mysql->escape_string($_POST['quant20']);
        $setor1 = $mysql->escape_string($_POST['setor1']);
        $setor2 = $mysql->escape_string($_POST['setor2']);
        $setor3 = $mysql->escape_string($_POST['setor3']);
        $setor4 = $mysql->escape_string($_POST['setor4']);
        $setor5 = $mysql->escape_string($_POST['setor5']);
        $setor6 = $mysql->escape_string($_POST['setor6']);
        $setor7 = $mysql->escape_string($_POST['setor7']);
        $setor8 = $mysql->escape_string($_POST['setor8']);
        $setor9 = $mysql->escape_string($_POST['setor9']);
        $setor10 = $mysql->escape_string($_POST['setor10']);
        $setor11 = $mysql->escape_string($_POST['setor11']);
        $setor12 = $mysql->escape_string($_POST['setor12']);
        $setor13 = $mysql->escape_string($_POST['setor13']);
        $setor14 = $mysql->escape_string($_POST['setor14']);
        $setor15 = $mysql->escape_string($_POST['setor15']);
        $setor16 = $mysql->escape_string($_POST['setor16']);
        $setor17 = $mysql->escape_string($_POST['setor17']);
        $setor18 = $mysql->escape_string($_POST['setor18']);
        $setor19 = $mysql->escape_string($_POST['setor19']);
        $setor20 = $mysql->escape_string($_POST['setor20']);
        $desc1 =  $mysql->escape_string($_POST['desc1']);
        $desc2 =  $mysql->escape_string($_POST['desc2']);
        $desc3 =  $mysql->escape_string($_POST['desc3']);
        $desc4 =  $mysql->escape_string($_POST['desc4']);
        $desc5 =  $mysql->escape_string($_POST['desc5']);
        $desc6 =  $mysql->escape_string($_POST['desc6']);
        $desc7 =  $mysql->escape_string($_POST['desc7']);
        $desc8 =  $mysql->escape_string($_POST['desc8']);
        $desc9 =  $mysql->escape_string($_POST['desc9']);
        $desc10 =  $mysql->escape_string($_POST['desc10']);
        $desc11 =  $mysql->escape_string($_POST['desc11']);
        $desc12 =  $mysql->escape_string($_POST['desc12']);
        $desc13 =  $mysql->escape_string($_POST['desc13']);
        $desc14 =  $mysql->escape_string($_POST['desc14']);
        $desc15 =  $mysql->escape_string($_POST['desc15']);
        $desc16 =  $mysql->escape_string($_POST['desc16']);
        $desc17 =  $mysql->escape_string($_POST['desc17']);
        $desc18 =  $mysql->escape_string($_POST['desc18']);
        $desc19 =  $mysql->escape_string($_POST['desc19']);
        $desc20 =  $mysql->escape_string($_POST['desc20']);
        $precUni1 = $mysql->escape_string($_POST['precUni1']);
        $precUni2 = $mysql->escape_string($_POST['precUni2']);
        $precUni3 = $mysql->escape_string($_POST['precUni3']);
        $precUni4 = $mysql->escape_string($_POST['precUni4']);
        $precUni5 = $mysql->escape_string($_POST['precUni5']);
        $precUni6 = $mysql->escape_string($_POST['precUni6']);
        $precUni7 = $mysql->escape_string($_POST['precUni7']);
        $precUni8 = $mysql->escape_string($_POST['precUni8']);
        $precUni9 = $mysql->escape_string($_POST['precUni9']);
        $precUni10 = $mysql->escape_string($_POST['precUni10']);
        $precUni11 = $mysql->escape_string($_POST['precUni11']);
        $precUni12 = $mysql->escape_string($_POST['precUni12']);
        $precUni13 = $mysql->escape_string($_POST['precUni13']);
        $precUni14 = $mysql->escape_string($_POST['precUni14']);
        $precUni15 = $mysql->escape_string($_POST['precUni15']);
        $precUni16 = $mysql->escape_string($_POST['precUni16']);
        $precUni17 = $mysql->escape_string($_POST['precUni17']);
        $precUni18 = $mysql->escape_string($_POST['precUni18']);
        $precUni19 = $mysql->escape_string($_POST['precUni19']);
        $precUni20 = $mysql->escape_string($_POST['precUni20']);
        $total = $_POST['valorTotal'];

        $erro = false;
        if((empty($fornece) || empty($assiCoord) || empty($setor)))  {
          $erro = "Preencha Os Campos Iniciais!";
        }



        else if($erro==false){

          $sql_code = "INSERT INTO `ordens`( `fornece`, `setor`, `requisitante`, `coordenador`, `uni1`, `uni2`, `uni3`, `uni4`, `quant1`, `quant2`, `quant3`, `quant4`, `prod1`, `prod2`, `prod3`, `prod4`, `desp1`, `desp2`, `desp3`, `desp4`, `preco1`, `preco2`, `preco3`, `preco4`, `total`, `Status`, `Data`) 
                                    VALUES ('$fornece','$setor','$assi1','$assiCoord','$uni1','$uni2','$uni3','$uni4','$quant1','$quant2','$quant3','$quant4','$desc1','$desc2','$desc3','$desc4','$setor1','$setor2','$setor3','$setor4','$precUni1','$precUni2','$precUni3','$precUni4','$total','',Now())";
          $deu_certo = $mysql->query($sql_code) or die($mysql->error);

        }
    }
?>



<?php
    if(!empty($erro)){
      echo $erro;
    }
    if(isset($deu_certo)){
        $mensagem_sucesso = "Enviado com Sucesso!";
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
    <?php if (isset($erro)): ?>
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
        <th><b>Fornecedor:</b><input id="a" name="fornece" type="text" required></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
      <tr>
        <th><b>Setor:</b> <select class="span12" name="setor" id="a" required>
                <option value="">Selecionar</option>
                <?php while($setores = $query_setores->fetch_assoc()){?>
                <option value="<?php  echo $setores['setor'];?>"><?php echo $setores['setor'];?></option>
                <?php } ?>
              </select></th>
        <th></th>
        <th></th>
        <th></th>
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
        <td><input type="text" class="unit" name="uni1" required></td>
        <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant1"required></td>
        <td><input type="text"  class="description"name="desc1" required></td>
          <td>
              <select class="span12" name="setor1" id="a" required>
                  <option value="">Selecionar</option>
                  <?php while ($setores = $query_setores2->fetch_assoc()){ ?>
                      <option value="<?php echo $setores['setor'];?>">
                          <?php echo $setores['setor'];?>
                      </option>
                  <?php } ?>
              </select>
          </td>    
          <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni1" required></td>
          <td class="totalValue" id="valor">0.00</td>
      </tr>
      <tr>
        <td><input type="text" class="unit" name="uni2"required></td>
        <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant2"required ></td>
        <td><input type="text" class="description" name="desc2" required></td>
          <td>
              <select class="span12"  id="a"name="setor2required">
                  <option value="">Selecionar</option>
                  <?php while($setores = $query_setores3->fetch_assoc()){?>
                      <option value="<?php echo $setores['setor'];?>"><?php echo $setores['setor'];?></option>
                  <?php } ?>
              </select>
          </td>
          <td><input type="text" class="unitPrice" step="0.01"  oninput="updateTotal(this)"name="precUni2"required ></td>
          <td class="totalValue"  id="valor" name="vt2">0.00</td>
      </tr>

      <tr>
        <td><input type="text" class="unit"name="uni3" required></td>
        <td><input type="number" class="quantity" oninput="updateTotal(this)"name="quant3" required></td>
        <td><input type="text" class="description" name="desc3"required></td>
          <td>
              <select class="span12"  id="a"name="setor3"required>
                  <option value="">Selecionar</option>
                  <?php while($setores = $query_setores4->fetch_assoc()){?>
                      <option value="<?php echo $setores['setor'];?>"><?php echo $setores['setor'];?></option>
                  <?php } ?>
              </select>
          </td>
          <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni3"required ></td>
          <td class="totalValue" name="vt3">0.00</td>
      </tr>

      <tr>
        <td><input type="text" class="unit" name="uni4"required ></td>
        <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant4"required ></td>
        <td><input type="text" class="description" name="desc4" required></td>
          <td>
              <select class="span12" id="a" name="setor4"required>
                  <option value="">Selecionar</option>
                  <?php while($setores = $query_setores5->fetch_assoc()){?>
                      <option value="<?php echo $setores['setor'];?>"><?php echo $setores['setor'];?></option>
                  <?php } ?>
              </select>
          </td>
          <td><input type="text" class="unitPrice" step="0.01"oninput="updateTotal(this)"name="precUni4"required ></td>
          <td class="totalValue" >0.00</td>
          <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">-</button></td>
      </tr>
       </tbody>
   </table>
    <div class="add-button-container">
        <button  type="button" id="addInput" class="btn btn-primary me-5 ">+</button>
    </div>
    <th><b>Valor Geral</b></th>
    <th><input placeholder="00,00" type="text" name="valorTotal" value="" class="Value" id="valor-Total" readonly></th>
   <table class="table">

    <thead>
      <tr>
        <th><b>Requisitante:</b> <?php echo $usuario['nome']; ?></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
      <tr>
        <th><b>Coordenador:</b>
        <select id="a" name="assiCoord">
                  <option value="">Selecionar</option>
                  <?php
                          if($num_assinatura==0){
                            $sql_usuarios_assinatura = "SELECT * FROM usuarios WHERE token2 = '7' ";
                            $query_usuarios_assinatura = $mysql->query($sql_usuarios_assinatura) or die($mysql->error);
                            while ($assinatura = $query_usuarios_assinatura->fetch_assoc()){
                    ?>
                  <option value="<?php echo $assinatura['ID'];?>"><?php echo $assinatura['nome'];?></option>

                    <?php
                            }}else{
                    while ($assinatura = $query_usuarios_assinatura->fetch_assoc()){?>
                      <option value="<?php echo $assinatura['ID'];?>"><?php echo $assinatura['nome'];?></option>
                    <?php }
                  }

                       ?>
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
var inicial = 4;

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

</body>

<script src="../../javaScript/mobile-navbar.js"></script>
<script src="../../javaScript/add.js"></script>

</html>
<?php } else {
    header("Location:../logout.php");
    die();
}
