<?php

class Orsamento
{

    private $selecionaOrsamento;
    private $Orsamento;


    public function __construct($IdOrsamento)
    {
        include '../php/Configuracao/conexao.php';

        if (isset($IdSetor)) {

            include '../php/Configuracao/conexao.php';
            $this->selecionaOrsamento = $mysql->query("SELECT * FROM Orsamentos WHERE ID = '{$IdOrsamento}'");

        }else{
            $this->selecionaOrsamento = $mysql->query("SELECT * FROM Orsamentos");
        }
        $this->quantOrsamento = $this->selecionaOrsamento->num_rows;

        for ($i = 0; $i < $this->quantOrsamento; $i++) {

            $this->Orsamento[$i] = $this->selecionaOrsamento->fetch_assoc();

        }
    }

    public function getAll()
    {
        if ($this->quantOrsamento == 0) {
            return "Nenhum Orsamento Cadastrado";
        }
        return $this->Orsamento;

    }

    public function SelecionaOrsamento()
    {

        return $this->Orsamento;

    }


}