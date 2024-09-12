<?php
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