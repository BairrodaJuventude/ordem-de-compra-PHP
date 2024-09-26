<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['admin']) || isset($_SESSION['usuario'])) {
    include('../conexao.php');
    require('../menu.php'); // Certifique-se de que o menu.php inclui o menu atualizado

    if (isset($_SESSION['admin'])) {
        $ID = $_SESSION['admin'];
    } else {
        $ID = $_SESSION['usuario'];
    }

    $sql_usuarios = "SELECT * FROM usuarios WHERE ID = '$ID'";
    $query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();

    $nome = htmlspecialchars($usuario['nome']); // Protege contra XSS
    $isAdmin = ($token == 1);
//        faz uma verificacao de sessao para fazer uma requisisao das informacoes do usuario
    if(isset($_SESSION['admin'])&&!isset($_SESSION['usuario'])) {
        $ID =$_SESSION['admin'];
    }else if(!isset($_SESSION['admin'])&&isset($_SESSION['usuario'])){
        $ID = $_SESSION['usuario'];
    }
//    Capta o identificador da ordem de compra via URI
    $id_ordem = intval($_GET['idme']);
//    Faz uma requisisao das informasoes do usuario logado
    $sql_usuario ="SELECT * FROM usuarios WHERE ID = '$ID'";
    $query_usuarios = $mysql->query($sql_usuario) or die($mysql->error);
    $usuario = $query_usuarios->fetch_assoc();

//    Faz uma listagem de todos os coordenadores cadastrados de acordo com seus tokens
    $sql_usuarios_usuario = "SELECT * FROM usuarios WHERE token = '7' ";
    $queryusuarios_usuario = $mysql->query($sql_usuarios_usuario) or die($mysql->error);
    $num_projetos = $queryusuarios_usuario->num_rows;
//    Faz uma requisisao das informasoes da ordem de compra de acordo com o identificador
    $sql_ordem = "SELECT * FROM ordens WHERE ID = '$id_ordem'";
    $query_ordem = $mysql->query($sql_ordem) or die($mysql->error);
    $ordens = $query_ordem->fetch_assoc();

    if($usuario['token'] == 11 || $usuario['token2'] == 11 ){
        $sql_projetos = "SELECT * FROM projetos";
        $query_projetos = $mysql->query($sql_projetos) or die($mysql->error);
        $num_projetos = $query_projetos->num_rows;


    }else{}

//  Faz uma contagem de arrays do tipo POST
    if(count($_POST) > 0){
        $direcao = 0;
        $status = $ordens['Status'];


//        Verificacao de tokens para o campo de autorizacao
        if($usuario['token']== 12 ||$usuario['token2']== 12 ){
            if(!empty($_POST['Status'])){
                $Status = $_POST['Status'];
            }
            $sql_code = "UPDATE `ordens` SET Status = '$Status' WHERE ID = '$id_ordem'";
            $deu_certo = $mysql->query($sql_code) or die($mysql->error);
            header("location: lista.php");
            }

        if(($usuario['token'] == 11 || $usuario['token2'] == 11) && (isset($_POST['projeto']))){

            if (empty($_POST['projeto'])){
                echo "Erro ao selecionar o projeto!";
            }
            if(!empty($_POST['Status'])){
                $Status = $_POST['Status'];
            }else{
                $Status = $ordens['Status'];
                echo "Erro Inesperado";
            }

            $id_projeto = $_POST['projeto'];
            $sql = "SELECT * FROM projetos WHERE ID = '$id_projeto'";
            $query = $mysql->query($sql) or die($mysql->error);
            $dados = $query->fetch_assoc();
            if ($Status == 2){

                if($dados['valor']<$ordens['total']){
                    echo "Erro!, O Projeto Selecionado Não tem Verba";
                }else{

                    $novo_valor = $dados['valor']-$ordens['total'];

                    $sql_code = "UPDATE `ordens` SET Status = '$Status', id_projeto = '$id_projeto' WHERE ID = '$id_ordem'";
                    $sql_code2 = "UPDATE projetos SET valor = '$novo_valor'  WHERE ID = '$id_projeto'";
                    $deu_certo = $mysql->query($sql_code) or die($mysql->error);
                    $deu_certo2 = $mysql->query($sql_code2) or die($mysql->error);
                    header("location: lista.php");

                }

            }elseif ($Status == 7){
                $sql_code = "UPDATE `ordens` SET Status = '$Status' WHERE ID = '$id_ordem'";
                $deu_certo = $mysql->query($sql_code) or die($mysql->error);
                header("location: lista.php");
            }
        }
        if($usuario['token'] == 7 || $usuario['token2'] == 7){
            if(!empty($_POST['assiDi'])){
                $direcao = $_POST['assiDi'];
            }else{
                echo "Erro Verifique os campos preenchidos!";
            }
            if (isset($_POST['Status'])){
                $status = $_POST['Status'];
            }else{
                echo "Erro não esperado!";
            }
            $sql_code = "UPDATE `ordens` SET Status = '$status', direcao = '$direcao' WHERE ID = '$id_ordem'";
            $deu_certo = $mysql->query($sql_code) or die($mysql->error);
            header("location: lista.php");
        }
        if($usuario['token'] == 5 || $usuario['token2'] == 5){
            if (isset($_POST['Status'])){
                $status = $_POST['Status'];
            }else{
                echo "Erro não esperado!";
            }
            $sql_code = "UPDATE `ordens` SET Status = '$status' WHERE ID = '$id_ordem'";
            $deu_certo = $mysql->query($sql_code) or die($mysql->error);
            header("location: lista.php");
        }
    }




    //    Requisicao de usuarios com o token de direcao para o direcionamento
    $sql_usuarios_usuario = "SELECT * FROM usuarios WHERE token AND token2 = '5'";
    $queryusuarios_usuario2 = $mysql->query($sql_usuarios_usuario) or die($mysql->error);
    $num_projetos = $queryusuarios_usuario2->num_rows;


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.6.0/jspdf.umd.min.js"></script>
    <link rel="stylesheet" href="../../css/lateral.css">
    <script src="../../javaScript/lateral.js" defer></script>
    <script src="../../javaScript/pdf.js" defer></script>
    <title>Projeto</title>
</head>
<body>

<nav>
    <div class="main-menu">
    <?php echo $top; ?>
</div>

<div class="sidebar">
    <p onclick="toggleDropdown()"><?php echo $nome; ?> ↓  </p>
    
    <ul id="user-menu" class="dropdown">
        <?php if ($token == 11 || $token2 == 11) { ?>
            <li><a href="projetos.php">Projetos</a></li>
        <?php } ?>
        <?php if ($isAdmin) { ?>
            <li><a href="admin.php">Configurações</a>
        <?php } ?>
        <a href="../logout.php">Logout</a></li>
    </ul>
</div>

</nav>

<main id="content">
    <div class="container-fluid p-5 text-center ">
        <h4>ORDEM DE COMPRA</h4>
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
                        <th for="data"><b>Urgência:</b>
                            <select class="urgencia" name="Urg" id="a">
                                <option value="<?php echo $ordens['Urgencia'];?>"><?php echo $ordens['Urgencia'];?></option>

                            </select>
                        </th>
                    </tr>
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
                <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant1" value="<?php echo $ordens['quant1'];?>"readonly></td>
                <td><input type="text"  class="description"name="desc1" value="<?php echo $ordens['prod1'];?>" readonly></td>
                <td>
                    <select class="span12" name="setor1" id="a" readonly>
                            <option value="<?php echo $ordens['desp1'];?>"><?php echo $ordens['desp1'];?></option>
                    </select>
                </td>
                <td><input type="text"  oninput="updateTotal(this)" name="precUni1" value="<?php echo $ordens['preco1'];?>"readonly></td>
                <td class="totalValue" id="valor"><?php echo $ordens['quant1']*$ordens['preco1'];?> </td>
            </tr>

           <?php if(!empty($ordens['uni2'])){?>
               <tr>
                   <td><input type="text" class="unit" name="uni2" value="<?php echo $ordens['uni2'];?>"readonly></td>
                   <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant2"value="<?php echo $ordens['quant2'];?>"readonly></td>
                   <td><input type="text"  class="description"name="desc1" value="<?php echo $ordens['prod2'];?>" readonly></td>
                   <td>
                       <select class="span12" name="setor1" id="a" readonly>
                           <option value="<?php echo $ordens['desp2'];?>"><?php echo $ordens['desp2'];?></option>
                       </select>
                   </td>
                   <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni2" value=" <?php echo $ordens['preco2'];?>"readonly></td>
                   <td class="totalValue" id="valor"><?php echo $ordens['quant2']*$ordens['preco2'];?></td>
               </tr>
           <?php }else{}?>
            <?php if(!empty($ordens['uni3'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni3" value="<?php echo $ordens['uni3'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant3"value="<?php echo $ordens['quant3'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc3" value="<?php echo $ordens['prod3'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor3" id="a" readonly>
                            <option value="<?php echo $ordens['desp3'];?>"><?php echo $ordens['desp3'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni3" value=" <?php echo $ordens['preco3'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant3']*$ordens['preco3'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni4'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni4" value="<?php echo $ordens['uni4'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant4"value="<?php echo $ordens['quant4'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc1" value="<?php echo $ordens['prod4'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor4" id="a" readonly>
                            <option value="<?php echo $ordens['desp4'];?>"><?php echo $ordens['desp4'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni4" value=" <?php echo $ordens['preco4'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant4']*$ordens['preco4'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni5'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni5" value="<?php echo $ordens['uni5'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant5"value="<?php echo $ordens['quant5'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc5" value="<?php echo $ordens['prod5'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor5" id="a" readonly>
                            <option value="<?php echo $ordens['desp5'];?>"><?php echo $ordens['desp5'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni5" value=" <?php echo $ordens['preco5'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant5']*$ordens['preco5'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni6'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni4" value="<?php echo $ordens['uni6'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant6"value="<?php echo $ordens['quant6'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc6" value="<?php echo $ordens['prod6'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor6" id="a" readonly>
                            <option value="<?php echo $ordens['desp6'];?>"><?php echo $ordens['desp6'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni6" value=" <?php echo $ordens['preco6'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant6']*$ordens['preco6'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni7'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni7" value="<?php echo $ordens['uni7'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant7"value="<?php echo $ordens['quant7'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc7" value="<?php echo $ordens['prod7'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor7" id="a" readonly>
                            <option value="<?php echo $ordens['desp7'];?>"><?php echo $ordens['desp7'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni7" value=" <?php echo $ordens['preco7'];?>"readonly></td>
                    <td class="totalValue"  id="valor"><?php echo $ordens['quant7']*$ordens['preco7'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni8'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni8" value="<?php echo $ordens['uni8'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant4"value="<?php echo $ordens['quant8'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc8" value="<?php echo $ordens['prod8'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor8" id="a" readonly>
                            <option value="<?php echo $ordens['desp8'];?>"><?php echo $ordens['desp8'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni8" value=" <?php echo $ordens['preco8'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant8']*$ordens['preco8'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni9'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni9" value="<?php echo $ordens['uni9'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant9"value="<?php echo $ordens['quant9'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc9" value="<?php echo $ordens['prod9'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor9" id="a" readonly>
                            <option value="<?php echo $ordens['desp9'];?>"><?php echo $ordens['desp9'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni9" value=" <?php echo $ordens['preco9'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant9']*$ordens['preco9'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni10'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni10" value="<?php echo $ordens['uni10'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant10"value="<?php echo $ordens['quant10'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc10" value="<?php echo $ordens['prod10'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor10" id="a" readonly>
                            <option value="<?php echo $ordens['desp10'];?>"><?php echo $ordens['desp10'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni10" value=" <?php echo $ordens['preco10'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant10']*$ordens['preco10'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni11'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni11" value="<?php echo $ordens['uni11'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant11"value="<?php echo $ordens['quant11'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc11" value="<?php echo $ordens['prod11'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor11" id="a" readonly>
                            <option value="<?php echo $ordens['desp11'];?>"><?php echo $ordens['desp11'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni11" value=" <?php echo $ordens['preco11'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant11']*$ordens['preco11'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni12'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni12" value="<?php echo $ordens['uni12'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant12"value="<?php echo $ordens['quant12'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc9" value="<?php echo $ordens['prod12'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor12" id="a" readonly>
                            <option value="<?php echo $ordens['desp12'];?>"><?php echo $ordens['desp12'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni12" value=" <?php echo $ordens['preco12'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant12']*$ordens['preco12'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni13'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni13" value="<?php echo $ordens['uni13'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant13"value="<?php echo $ordens['quant13'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc13" value="<?php echo $ordens['prod13'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor9" id="a" readonly>
                            <option value="<?php echo $ordens['desp13'];?>"><?php echo $ordens['desp13'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni13" value=" <?php echo $ordens['preco13'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant13']*$ordens['preco13'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni14'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni9" value="<?php echo $ordens['uni14'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant14"value="<?php echo $ordens['quant14'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc9" value="<?php echo $ordens['prod14'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor14" id="a" readonly>
                            <option value="<?php echo $ordens['desp14'];?>"><?php echo $ordens['desp14'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni14" value=" <?php echo $ordens['preco14'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant14']*$ordens['preco14'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni15'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni15" value="<?php echo $ordens['uni15'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant15"value="<?php echo $ordens['quant15'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc15" value="<?php echo $ordens['prod15'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor15" id="a" readonly>
                            <option value="<?php echo $ordens['desp15'];?>"><?php echo $ordens['desp15'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni15" value=" <?php echo $ordens['preco15'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant15']*$ordens['preco15'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni16'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni16" value="<?php echo $ordens['uni16'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant16"value="<?php echo $ordens['quant16'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc16" value="<?php echo $ordens['prod16'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor16" id="a" readonly>
                            <option value="<?php echo $ordens['desp16'];?>"><?php echo $ordens['desp16'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni16" value=" <?php echo $ordens['preco16'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant16']*$ordens['preco16'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni17'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni9" value="<?php echo $ordens['uni17'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant17"value="<?php echo $ordens['quant17'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc17" value="<?php echo $ordens['prod17'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor17" id="a" readonly>
                            <option value="<?php echo $ordens['desp17'];?>"><?php echo $ordens['desp17'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni17" value=" <?php echo $ordens['preco17'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant17']*$ordens['preco17'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni18'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni18" value="<?php echo $ordens['uni18'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant18"value="<?php echo $ordens['quant18'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc18" value="<?php echo $ordens['prod18'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor18" id="a" readonly>
                            <option value="<?php echo $ordens['desp18'];?>"><?php echo $ordens['desp18'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni18" value=" <?php echo $ordens['preco18'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant18']*$ordens['preco18'];?></td>
                </tr>
            <?php }else{}?>

            <?php if(!empty($ordens['uni19'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni19" value="<?php echo $ordens['uni19'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant19"value="<?php echo $ordens['quant19'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc19" value="<?php echo $ordens['prod19'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor19" id="a" readonly>
                            <option value="<?php echo $ordens['desp19'];?>"><?php echo $ordens['desp19'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni19" value=" <?php echo $ordens['preco19'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant19']*$ordens['preco19'];?></td>
                </tr>
            <?php }else{}?>
            <?php if(!empty($ordens['uni20'])){?>
                <tr>
                    <td><input type="text" class="unit" name="uni20" value="<?php echo $ordens['uni20'];?>"readonly></td>
                    <td><input type="number" class="quantity" oninput="updateTotal(this)" name="quant20"value="<?php echo $ordens['quant20'];?>"readonly></td>
                    <td><input type="text"  class="description"name="desc9" value="<?php echo $ordens['prod20'];?>" readonly></td>
                    <td>
                        <select class="span12" name="setor20" id="a" readonly>
                            <option value="<?php echo $ordens['desp20'];?>"><?php echo $ordens['desp20'];?></option>
                        </select>
                    </td>
                    <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni20" value=" <?php echo $ordens['preco20'];?>"readonly></td>
                    <td class="totalValue" id="valor"><?php echo $ordens['quant20']*$ordens['preco20'];?></td>
                </tr>
            <?php }else{}?>
            <th><b>Valor Geral</b></th>
            <th><input placeholder="00,00" type="text" name="valorTotal" value="<?php echo $ordens['total']; ?>" class="Value" id="valor-Total" readonly></th>

            <?php
            if($usuario['token'] == 11 || $usuario['token2'] == 11){?>
                <th>
                    <b>Projetos</b>
                    <b>
                        <?php if($num_projetos <= 0){ ?>
                            Nenhum Projeto Criado/Cadastrado...
                        <?php
                            }else{
                                    echo "<select name='projeto'>";
                                    echo "<option value=''>Selecione</option>";
                                    while ($projetos = $query_projetos->fetch_assoc()){?>
                                        <option value="<?php echo $projetos['ID']; ?>">
                                            <b><?php echo $projetos['nome']; ?></b>
                                            <b><?php echo $projetos['valor']; ?></b>
                                        </option>

                                      <?php
                                    }?></select><?php
                            }
                        ?>
                    </b>
                </th>
                <th><b></b></th>
                <th>
                    <b>
                        <button type="submit" name="Status" value="2">Encaminhar</button>
                        <button type="submit" name="Status" value="7">Não Possui Projeto</button>
                    </b>
                </th>
            <?php } elseif($usuario['token'] == 12 || $usuario['token2'] == 12){
                if($ordens['id_projeto'] != 0){
                $id_projeto = $ordens['id_projeto'];
            $sql_pro = "SELECT * FROM projetos WHERE ID = '$id_projeto'";
            $query_pro = $mysql->query($sql_pro) or die($mysql->error);
            $ordem_projeto = $query_pro->fetch_assoc();
            ?>
            <th>
                <td><b>Projeto: <?php echo $ordem_projeto['nome']; ?></b></td>
            </th>
            <?php }else{}} ?>
        </table>
<!--        Vericacao de tokens para a mostra de Um campo de autorizacao de envio   -->
        <?php if ($usuario['token']==7 || $usuario['token2'] == 7){?>
<!--            <button id="button" style="background-color: #ff0000; color: white;" name="status" value="" type="submit">Rejeitar</button>-->
            <button id="button" style="background-color: #0000ff; color: white;" name="Status" value="4" type="submit">Autorizar</button>
        <?php }elseif($usuario['token'] == 5 || $usuario['token2'] == 5){?>
<!--            <button id="button" style="background-color: #ff0000; color: white;" name="status" value="" type="submit">Rejeitar</button>-->
            <button id="button" style="background-color: #0000ff; color: white;" name="Status" value="5" type="submit">Autorizar</button>
       <?php }elseif($usuario['token'] == 3 || $usuario['token2'] == 3){?>
<!--           <button class="buttonmover"  name="reseb" value="1" type="submit">Mover Para Historico</button>-->
        <?php } ?>
        <table class="table">
            <thead>
            <tr>
                <th><b>Requisitante:</b>

                    <?php
//                        Busca da projetos do requisitante
                        $idRequisitante = $ordens['requisitante'];
                        $sql_ordemRe = "SELECT * FROM usuarios WHERE ID = '$idRequisitante'";
                        $query_ordemRe = $mysql->query($sql_ordemRe) or die($mysql->error);
                        $ordenRe = $query_ordemRe->fetch_assoc();
                       echo $ordenRe['nome'];
                    ?>
                </th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th><b>Coordenador:</b>
                        <?php
//                        Busca da projetos do coordenador
                            $id_coor = $ordens['coordenador'];
                            $sql_usuarios_usuario = "SELECT * FROM usuarios WHERE ID = $id_coor ";
                            $queryusuarios_usuario = $mysql->query($sql_usuarios_usuario) or die($mysql->error);
                            $projetos = $queryusuarios_usuario->fetch_assoc();
                                 echo $projetos['nome'];
                        ?>
                </th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <?php if ($usuario['token'] != 11 || $usuario['token2'] != 11){
                if ( $usuario['token'] != 12 || $usuario['token2'] != 12){
                if(($usuario['token'] != 3 || $usuario['token2'] != 3) && ($ordens['Status'] != 1)) {?>
                    <tr>
                        <th><b>Aprovador:</b>

                            <select id="a" name="assiDi">
                                <!--                        Busca da projetos da Direcao-->
                                <?php

                                if ($usuario['token'] == 7 || $usuario['token2'] == 7 || $usuario['token'] == 1 || $usuario['token2'] == 1) {

                                    while ($projetos2 = $queryusuarios_usuario2->fetch_assoc()){?>
                                        <option value="<?php echo $projetos2['ID'];?>"><?php echo $projetos2['nome'];?></option>
                                        <?php
                                    }
                                } else{
                                    $id_dire = $ordens['direcao'];
                                    $sql_usuarios_usuario2 = "SELECT * FROM usuarios WHERE ID = '$id_dire' ";
                                    $query_usuarios_usuario2 = $mysql->query($sql_usuarios_usuario2) or die($mysql->error);
                                    $projetos2 = $query_usuarios_usuario2->fetch_assoc();?>
                                    <option value="<?php echo $id_dire?>"><?php echo $projetos2['nome']; ?></option>
                                    <?php
                                }?>
                            </select>

                        </th>
                        <th></th>
                        <th></th>
                        <th></th>

                    </tr>
                    <?php
                    }else{
                        if ($ordens['Status'] == 2){?>
                            <button>Salvar</button>
                            <?php
                            }
                    }
                 }else{
                    if($ordens['Status'] == 0){?>
                        <button id="button" style="background-color: #0000ff; color: white;" name="Status" value="1" type="submit">Encaminhar</button>
               <?php }elseif($ordens['Status'] == 2){?>
                        <button id="button" style="background-color: #0000ff; color: white;" name="Status" value="3" type="submit">Redirecionar</button>
                    <?php }else{?>
                        <button id="button" style="background-color: #0000ff; color: white;" name="Status" value="8" type="submit">Redirecionar</button>
                    <?php }

                }
            }
            ?>
        </thead>

            <span></span>

            </form>
        </table>
    </section>
    </div>



</main>



</body>

<script src="../../javaScript/enviar.js"></script>

    </html>

<?php
} else {
    header("Location:../logout.php");
    die();
}
?>