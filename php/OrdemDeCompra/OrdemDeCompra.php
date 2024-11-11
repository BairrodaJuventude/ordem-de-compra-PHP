<?php

class OrdemDeCompra
{
    private $selecionaOrdens;
    private $ordens;
    private int $quantOrdens;


    public function __construct($caracteristica, $IdUsuario,  $StatusOrdem, $Requisitante, $Coordenador, $Aprovador, $historico)
    {
        include '../php/Configuracao/conexao.php';

        if(empty($historico))
        {
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
                            $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE Status = '0' OR Status = '2' AND histCom = 0");

                        }else
                            if($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Projetos")
                            {

                                $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE Status = '1' AND histPro = 0");
                            }
                    }else{
                        if(isset($Requisitante)){
                            $this->selecionaOrdens = $mysql->query("SELECT * FROM ordens WHERE requisitante = '{$IdUsuario}' AND histUsu = 0");
                        }else
                            if(isset($Coordenador)){
//                                $this->selecionaOrdens =  $mysql->query("SELECT * FROM ordens WHERE coordenador = '{$IdUsuario}' AND histCoo = '0' AND Status = '3'");
                            }else
                                if(isset($Aprovador)){
                                    $this->selecionaOrdens = $mysql->query("SELECT * FROM ordens WHERE direcao = '{$IdUsuario}' AND Status = '4' AND histDir = 0");
                                }

                    }

                }else
                    if (!empty($StatusOrdem)) {

                        include '../php/Configuracao/conexao.php';
                        $this->selecionaOrdens = $mysql->query("SELECT * FROM ordens WHERE Status = '{$StatusOrdem}'");
                    }else {

                        $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` ORDER BY `ordens`.`ID` DESC ");

                    }
        }else{
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
                            $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE Status = '0' OR Status = '2' AND histCom = 1");

                        }else
                            if($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Projetos")
                            {

                                $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE Status = '1' AND histPro = 1");
                            }
                    }else{
                        if($Requisitante){
                            $this->selecionaOrdens = $mysql->query("SELECT * FROM ordens WHERE requisitante = '{$IdUsuario}' AND histUsu = 1");
                        }else
                            if($Coordenador){
                                $this->selecionaOrdens = $mysql->query("SELECT * FROM ordens WHERE coordenador = '{$IdUsuario}' AND Status = '3' AND  histCoo = 1");
                            }else
                                if($Aprovador){
                                    $this->selecionaOrdens = $mysql->query("SELECT * FROM ordens WHERE direcao = '{$IdUsuario}' AND Status = '4' AND histDir = 1");
                                }

                    }

                }else
                    if (!empty($StatusOrdem)) {

                        include '../php/Configuracao/conexao.php';
                        $this->selecionaOrdens = $mysql->query("SELECT * FROM ordens WHERE Status = '{$StatusOrdem}'");
                    }else {

                        $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` ORDER BY `ordens`.`ID` DESC ");

                    }
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



        }

        return $this->ordens;

    }

    public function SelecionaOrdem()
    {

        return $this->ordens;

    }

}