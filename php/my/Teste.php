<?php
include('../conexao.php');
function enviarCapa($error, $size, $name, $tmp_name){


    if($error)
        die("Falha ao enviar o arquivo");

    if($size > 20971556566200)
        die('Arquivo muito grande!! Max: 2ASDFGHJKMB');

    $pasta= "ImagensOrdens/";
    $nomeDoArquivo = $name;
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png' && $extensao != 'svg' &&
        $extensao != 'spd' && $extensao != 'webp' && $extensao != 'raw' && $extensao != 'tiff' &&
        $extensao != 'bmp') {
        die("Tipo de arquivo nao aceito");
    }
    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    //$deu_certo = move_uploaded_file($tmp_name, $pasta );
    $deu_certo = move_uploaded_file($tmp_name, $pasta . $novoNomeDoArquivo . "." . $extensao );



    if(isset($_FILES['arquivos1'])){
        if($deu_certo){
            return $path;
        }else
            return $path;
    }

}


if(isset($_FILES['arquivos1'])){
    $arquivos = $_FILES['arquivos1'];
    //$arquivos2 = $_FILES['arquivos2'];
    $tudo_certo = true;
    foreach($arquivos['name'] as $index => $arq){
        $path = enviarCapa($arquivos['error'][$index], $arquivos['size'][$index], $arquivos['name'][$index], $arquivos['tmp_name'][$index]);

    }

    echo $path;

}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">

    <label for="email">Selecione o arquivo:</label>
    <input name="arquivos1[]" multiple  type="file">
    <button type="submit">sd</button>
</form>
</body>
</html>
