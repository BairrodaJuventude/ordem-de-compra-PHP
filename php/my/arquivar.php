<?php

    $ID = $_GET['id'];
    $IdOrdem = $_GET['idme'];

    arquivar($IdOrdem, $ID);
    header("Location: lista.php");
    function arquivar($IdOrdem, $ID)
    {
        include '../conexao.php';
        if (!$ID){
            return 'Erro Na Identificacao';
        }

        $sql_usuario ="SELECT * FROM usuarios WHERE ID = '$ID' ";
        $query_usuario = $mysql->query($sql_usuario) or die($mysql->error);

        if (!$query_usuario)
        {
            return 'Erro Na autenticacao';
        }

        $usuario = $query_usuario->fetch_assoc();

        if ($usuario['token'] == 1 || $usuario['token2'] == 1)
        {
            $arquiva = "UPDATE `ordens` SET histAdm = '1' WHERE ID = $IdOrdem";
        }
        if ($usuario['token'] == 3 || $usuario['token2'] == 3)
        {
            $arquiva = "UPDATE `ordens` SET histUsu = '1' WHERE ID = $IdOrdem";
        }
        if ($usuario['token'] == 5 || $usuario['token2'] == 5)
         {
            $arquiva = "UPDATE `ordens` SET histDir = '1' WHERE ID = $IdOrdem";
        }
        if ($usuario['token'] == 7 || $usuario['token2'] == 7)
         {
            $arquiva = "UPDATE `ordens` SET histCoo = '1' WHERE ID = $IdOrdem";
         }
        if ($usuario['token'] == 11 || $usuario['token2'] == 11)
         {
            $arquiva = "UPDATE `ordens` SET histPro = '1' WHERE ID = $IdOrdem";
         }
        if ($usuario['token'] == 12 || $usuario['token2'] == 12)
         {
            $arquiva = "UPDATE `ordens` SET histCom = '1' WHERE ID = $IdOrdem";
         }
        if ($usuario['token'] == 13 || $usuario['token2'] == 13)
         {
            $arquiva = "UPDATE `ordens` SET histAlm = '1' WHERE ID = $IdOrdem";
         }

        $queryArquiva= $mysql->query($arquiva) or die($mysql->error);

         if (!$queryArquiva){
             return 'Erro Nao Esperado';
         }
        return 'Ordem Arquivada';
    }