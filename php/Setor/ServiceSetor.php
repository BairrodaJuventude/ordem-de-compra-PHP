<?php

    include 'Setor.php';

    function listarSetor(): array
    {

        $selecionaSetores = new Setor(null);
        $Setores[] = $selecionaSetores->getAll();

        return $Setores;
    }
    function cadastraSetor()
    {

        include '../php/Configuracao/conexao.php';

        $nomeSetor =  $mysql->escape_string($_POST['nomeSetor']);
        $valorSetor = $mysql->escape_string($_POST['valorSetor']);



        $mysql->query("INSERT INTO `setor`(`Setor`, `valor`) VALUES ('{$nomeSetor}','{$valorSetor}')");

        return true;
    }