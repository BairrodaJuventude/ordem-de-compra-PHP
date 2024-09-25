<?php
function enviarCapa($error, $name, $tmp_name){

$erro = false;

if(!empty($error)) {
    $erro = "Falha ao enviar o arquivo";
    return $erro;
}


$pasta= "ImagensOrdens/";
$nomeDoArquivo = $name;
$novoNomeDoArquivo = uniqid();
$extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png' && $extensao != 'svg' &&
$extensao != 'spd' && $extensao != 'webp' && $extensao != 'raw' && $extensao != 'tiff' &&
$extensao != 'bmp' &&
    $extensao != 'pdf') {
    $erro = "Tipo de arquivo nao aceito";
    return $erro;
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