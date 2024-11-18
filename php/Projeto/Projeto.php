<?php

class Projeto
{
    private $selecionaProjetos;
    private $Projetos;
    private int $quantProjetos;


    public function __construct($caracteristica, $valor)
    {
        include '../php/Configuracao/conexao.php';

        if ($caracteristica) {

            $this->selecionaProjetos = $mysql->query("SELECT * FROM Projetos WHERE ID = '{$caracteristica}'");

        }
        if ($valor) {

            include '../php/Configuracao/conexao.php';
            $this->selecionaProjetos = $mysql->query("SELECT * FROM Projetos WHERE valor >= '{$valor}'");

        }
        if ((!$caracteristica) && ($valor)){
            $this->selecionaProjetos = $mysql->query("SELECT * FROM `Projetos` ORDER BY `Projeto`.`ID` DESC ");

        }
        $this->quantProjetos = $this->selecionaProjetos->num_rows;

        for ($i = 0; $i < $this->quantProjetos; $i++) {

            $this->Projetos[$i] = $this->selecionaProjetos->fetch_assoc();

        }
    }

    public function getAll()
    {
        if ($this->quantProjetos == 0 )
        {
            return "Nenhum Projeto Cadastrado";
        }

        return $this->Projetos;

    }

    public function SelecionaProjeto()
    {

        return $this->Projetos;

    }
}