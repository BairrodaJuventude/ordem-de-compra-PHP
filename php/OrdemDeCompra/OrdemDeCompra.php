<?php

class OrdemDeCompra
{
    private $selecionaOrdens;
    private $ordens;
    private int $quantOrdens;


    public function __construct($caracteristica, $IdUsuario,  $StatusOrdem, $Requisitante, $Coordenador, $Aprovador)
    {
        include '../php/Configuracao/conexao.php';

        if (!empty($caracteristica)) {

            include '../php/Configuracao/conexao.php';
            $this->selecionaOrdens = $mysql->query("SELECT * FROM ordens WHERE ID = '{$caracteristica}'");
        }else
        if (!empty($IdUsuario)) {

            include '../php/Configuracao/conexao.php';

            if($StatusOrdem)
            {
                $VerificaUsuario = new usuarios($IdUsuario,null);

                if($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Compras")
                {
                    $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE Status = '0' OR Status = '2'");

                }else
                    if($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Projetos")
                    {

                        $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE Status = '1'");
                    }
            }else{
                    if($Requisitante){
                        $this->selecionaOrdens = $mysql->query("SELECT * FROM ordens WHERE requisitante = '{$IdUsuario}'");
                    }else
                    if($Coordenador){
                        $this->selecionaOrdens = $mysql->query("SELECT * FROM ordens WHERE coordenador = '{$IdUsuario}' AND Status = '3'");
                    }else
                    if($Aprovador){
                        $this->selecionaOrdens = $mysql->query("SELECT * FROM ordens WHERE direcao = '{$IdUsuario}' AND Status = '4'");
                    }


            }

        }else
        if (!empty($StatusOrdem)) {

            include '../php/Configuracao/conexao.php';
            $this->selecionaOrdens = $mysql->query("SELECT * FROM ordens WHERE Status = '{$StatusOrdem}'");
        }else {

            $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` ORDER BY `ordens`.`ID` DESC ");

        }

        $this->quantOrdens = $this->selecionaOrdens->num_rows;

        for ($i = 0; $i < $this->quantOrdens; $i++) {

            $this->ordens[$i] = $this->selecionaOrdens->fetch_assoc();


        }
    }

    public function getAll()
    {


        for ($i = 0; $i < $this->quantOrdens; $i++) {

            if (($this->ordens[$i]['Status'] == 0) || ($this->ordens[$i]['Status'] == 1) ||
                ($this->ordens[$i]['Status'] == 2) || ($this->ordens[$i]['Status'] == 3) ||
                ($this->ordens[$i]['Status'] == 4)){

                    $this->ordens[$i]['Status'] = "Em Espera Da Aprovação";

            }else
            if($this->ordens[$i]['Status'] == 5){

                $this->ordens[$i]['Status'] = "Aprovado";

            }else
            if($this->ordens[$i]['Status'] == 7){

                $this->ordens[$i]['Status'] = "Não ha Projeto";
            }
            if ($this->ordens[$i]['coordenador'] == 0){

                $this->ordens[$i]['coordenador'] == "";
            }


        }

        return $this->ordens;

    }

    public function SelecionaOrdem()
    {

        return $this->ordens;

    }

}