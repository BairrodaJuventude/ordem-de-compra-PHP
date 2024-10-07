<?php
function salvarImagem($error, $name, $tmp_name, $grupoImagem){

    include('../conexao.php');
    $erro = false;

    if(!empty($error))
    {
        $erro = "Falha ao enviar o arquivo";
        return $erro;
    }

    $pasta= "ImagensOrdens/";
    $nomeDoArquivo = $name;
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png' &&
        $extensao != 'svg' &&$extensao != 'spd' && $extensao != 'webp' &&
        $extensao != 'raw' && $extensao != 'tiff' &&$extensao != 'bmp' &&
        $extensao != 'pdf')
    {
        $erro = "Tipo de arquivo nao aceito";
        return $erro;

    }
    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($tmp_name, $pasta . $novoNomeDoArquivo . "." . $extensao );

    if (!$deu_certo)
    {
        $erro = "Falha ao Enviar o arquivo";
        return $erro;
    }

    $cadastraImagem = "INSERT INTO `imagensordens`( `NomeOrigem`, `GrupOrdem`, `path`) VALUES ('$name', '$grupoImagem', '$path')";
    $verifica = $mysql->query($cadastraImagem)or die($mysql->error);

    if(!$verifica)
    {
        $erro = "Falha ao Salvar o arquivo";
        return $erro;
    }

            return $grupoImagem;

}
function listarImagem($grupImagem)
{
    include('../conexao.php');

    if (empty($grupImagem)){
        return "<p>Nenhum Arquivo Foi Anexado Nesta Ordem de Compra</p>";
    }

    $selecionaImagem = "SELECT * FROM `imagensordens` WHERE GrupOrdem = '$grupImagem'";
    $verifica = $mysql->query($selecionaImagem)or die($mysql->error);
    $quantImagem = $verifica->num_rows;

    if($quantImagem == 0)
    {
        return "Imagem Nao Incontrada";
    }
    for ($i = 0; $quantImagem > $i; $i++)
    {
        $imagem[$i] = $verifica->fetch_assoc();
    }


        return $imagem;

}