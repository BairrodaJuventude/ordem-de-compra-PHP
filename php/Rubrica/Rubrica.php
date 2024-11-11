<?php

class Rubrica
{

    private $selecionaRubricas;
    private $Rubricas;
    private int $quantRubricas;


    public function __construct()
    {
        include '../php/Configuracao/conexao.php';

            $this->selecionaRubricas = $mysql->query("SELECT * FROM `Rubricas` ORDER BY `Rubricas`.`ID` ASC ");


        $this->quantRubricas = $this->selecionaRubricas->num_rows;

        for ($i = 0; $i < $this->quantRubricas; $i++) {

            $this->Rubricas[$i] = $this->selecionaRubricas->fetch_assoc();

        }
    }

    public function getAll()
    {
        if ($this->quantRubricas == 0 )
        {
            return "Nenhuma Rubrica Cadastrada";
        }
        return $this->Rubricas;

    }

    public function SelecionaRubrica()
    {

        return $this->Rubricas;

    }
}