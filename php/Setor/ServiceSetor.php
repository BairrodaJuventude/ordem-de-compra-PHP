<?php

    include 'Setor.php';

    function listarSetores(): array
    {

        $selecionaSetores = new Setor(null);
        $Setores[] = $selecionaSetores->getAll();

        return $Setores;
    }
    function cadastraSetor()
    {

        $dados = implode(",", $_POST);
        $colunas = $mysql->query("SHOW COLUMNS FROM Setor");

print_r($colunas);
    }