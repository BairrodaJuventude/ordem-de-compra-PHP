<?php





function enviarCapa($error, $size, $name, $tmp_name)
{

    include('../conexao.php');
    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];
    }

    if ($error)
        die("Falha ao enviar o arquivo");

    if ($size > 20971556566200)
        die('Arquivo muito grande!! Max: 2ASDFGHJKMB');

    $pasta = "ImagensOrdens/";
    $nomeDoArquivo = $name;
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao != 'jpg' && $extensao != 'png' && $extensao != 'pdf' && $extensao != 'docx' && $extensao != 'jfif' && $extensao != 'jpeg')
        die("Tipo de arquivo nao aceito");

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    //$deu_certo = move_uploaded_file($tmp_name, $pasta );
    $deu_certo = move_uploaded_file($tmp_name, $pasta . $novoNomeDoArquivo . "." . $extensao);

    if (isset($_FILES['arquivos1'])) {
        if ($deu_certo) {
            $mysql->query("INSERT INTO `imagensordens`( `NomeOrigem`, `GrupOrdem`, `path`) VALUES ('$name', 'sdfghjk', '$path')");
            return true;
        } else
            return false;
    }


}


if (isset($_FILES['arquivos1'])) {
    $arquivos = $_FILES['arquivos1'];

    $tudo_certo = true;
    foreach ($arquivos['name'] as $index => $arq) {
        $deu_certo = enviarCapa($arquivos['error'][$index], $arquivos['size'][$index], $arquivos['name'][$index], $arquivos['tmp_name'][$index]);
        echo "<p>Erro ao enviar um ou mais arquivos!</p>";
        if (!$deu_certo)
            $tudo_certo = false;

    }
    if ($tudo_certo) {
        echo "<p>Todos os aquivos foram  enviados com sucesso!</p>";
    } else {
        echo "<p>Erro ao enviar um ou mais arquivos!</p>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/styles/css/forms.css">
    <title>Painel</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    <input name="nome"  type="text">
    <label for="email">Selecione o arquivo:</label>
    <input name="arquivos1[]" multiple type="file">
    <button type="submit">ghjk</button>
</form>

</body>
</html>
