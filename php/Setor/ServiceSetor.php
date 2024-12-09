<?php

    include 'Setor.php';

    function listarSetor(): array
    {

        $selecionaSetores = new Setor(null);
        $Setores[] = $selecionaSetores->getAll();

        return $Setores;
    }
    function selecionaSetor($IdSetor): array
    {

        $selecionaSetores = new Setor($IdSetor);
        $Setores[] = $selecionaSetores->getAll();

        return $Setores;
    }
    function cadastraSetor()
    {

        include '../php/Configuracao/conexao.php';

        $nomeSetor =  $mysql->escape_string($_POST['nomeSetor']);

        $mysql->query("INSERT INTO `setores`(`Setor`, dataCadastro) VALUES ('{$nomeSetor}', NOW())");

        return true;
    }

    function editarSetor($IdSetor)
    {

        include '../php/Configuracao/conexao.php';

        $novoNomeSetor =  $mysql->escape_string($_POST['nomeSetor']);

        $mysql->query("UPDATE setores SET Setor = '{$novoNomeSetor}' WHERE ID = '{$IdSetor}'");

        return true;
    }
