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
    $setores = $query_setores->fetch_assoc();

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

        else if($erro===false){
          $sql_code = "INSERT INTO `ordens`(`ID`, `fornece`, `setor`, `requisitante`, `coordenador`, `direcao`,'Não Informado',NOW())";
          $deu_certo = $mysql->query($sql_code) or die($mysql->error);

        }
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
                <?php for($i=0; $num_setores>=$i;){?>
                <option value="<?php  $i++; echo $setores['id_setor'];?>"><?php echo $setores['setor'];?></option>
                <?php } ?>
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
        <td><input type="text" class="unit" ></td>
        <td><input type="number" class="quantity" oninput="updateTotal(this)" ></td>
        <td><input type="text" class="description" ></td>
          <td>
              <select class="span12" name="dis1" id="a" >
                  <option value="">Selecionar</option>
                  <?php for($i=0; $num_setores>=$i; $i++){?>
                      <option value="<?php echo $setores['id_setor'];?>"><?php echo $setores['setor'];?></option>
                  <?php } ?>
              </select>
          </td>    
          <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" ></td>
          <td class="totalValue" id="valor">0.00</td>      
      </tr>
      <tr>
        <td><input type="text" class="unit" ></td>
        <td><input type="number" class="quantity" oninput="updateTotal(this)" ></td>
        <td><input type="text" class="description" ></td>
          <td>
              <select class="span12" name="dis2" id="a" >
                  <option value="">Selecionar</option>
                  <?php while($setores2 = $query_setores->fetch_assoc()){?>
                      <option value="<?php echo $setores2['id_setor'];?>"><?php echo $setores2['setor'];?></option>
                  <?php } ?>
              </select>
          </td>    
          <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" ></td>
          <td class="totalValue" id="valor">0.00</td> 
      </tr>

      <tr>
        <td><input type="text" class="unit" ></td>
        <td><input type="number" class="quantity" oninput="updateTotal(this)" ></td>
        <td><input type="text" class="description" ></td>
          <td>
              <select class="span12" name="dis3" id="a" >
                  <option value="">Selecionar</option>
                  <?php while($setores = $query_setores->fetch_assoc()){?>
                      <option value="<?php echo $setores['id_setor'];?>"><?php echo $setores['setor'];?></option>
                  <?php } ?>
              </select>
          </td>    
          <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" ></td>
          <td class="totalValue">0.00</td> 
      </tr>

      <tr>
        <td><input type="text" class="unit" ></td>
        <td><input type="number" class="quantity" oninput="updateTotal(this)" ></td>
        <td><input type="text" class="description" ></td>
          <td>
              <select class="span12" name="dis4" id="a" >
                  <option value="">Selecionar</option>
                  <?php while($setores = $query_setores->fetch_assoc()){?>
                      <option value="<?php echo $setores['id_setor'];?>"><?php echo $setores['setor'];?></option>
                  <?php } ?>
              </select>
          </td>    
          <td><input type="text" class="unitPrice" step="0.01"  oninput="updateTotal(this)" ></td>
          <td class="totalValue">0.00</td> 
      </tr>

      

      <th><b>Valor Geral</b></th>
      <th><input placeholder="00,00" type="text" class="Value" id="valor-Total" readonly></th>
   </table>

   <table class="table">
    <thead>
      <tr>
        <th><b>Requisitante:</b> <input id="a" name="assi1" value="<?php echo $nome; ?>" readonly type="text"></th>
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
      </tr>

      <tr>
        <th><b>Direção:</b><select id="a">
                  <option value="Selecionar">Marcelo</option>
                </select>
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
<?php } else {
    header("Location:../logout.php");
    die();
}
