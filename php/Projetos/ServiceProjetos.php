<?php

require_once 'Projeto.php';

function ListarProjetos()
{

    $projetos = new Projeto(null);
    $projetos[] = $projetos->getAll();

    return $projetos;
}