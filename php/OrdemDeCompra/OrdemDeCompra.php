<?php

class OrdemDeCompra
{
    private $selecionaOrdens;
    private $ordens;
    private int $quantOrdens;


    public function __construct($IdOrdem, $IdUsuario, $Recebe, $Historico )
    {
        include '../php/Configuracao/conexao.php';

       if($IdOrdem)
       {
           $this->selecionaOrdens = $mysql->query("SELECT * FROM ordens WHERE ID = '{$IdOrdem}'");
       }

       if($IdUsuario)
       {

           if($Recebe)
           {

               $VerificaUsuario = new usuarios($IdUsuario, null);

               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Compras") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE (Status = '0' OR Status = '2') AND histCom = 0");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Projeto") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE Status = '1' AND histPro = 0");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Usuario") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE (coordenador = '{$IdUsuario}' OR direcao = '{$IdUsuario}') AND histUsu = 0");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Admin") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE (coordenador = '{$IdUsuario}' OR direcao = '{$IdUsuario}') AND histAdm = 0");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Coordenador") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE (coordenador = '{$IdUsuario}' OR direcao = '{$IdUsuario}') AND histCoo = 0 AND (Status = 3 OR Status = 7)");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Aprovador") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE (coordenador = '{$IdUsuario}' OR direcao = '{$IdUsuario}') AND Status = 4 AND histDir = 0");

               }
           }

           if((!$Recebe)&&(!$Historico))
           {
               $VerificaUsuario = new usuarios($IdUsuario, null);

               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Compras") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE requisitante = '{$IdUsuario}' AND histCom = 0");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Projetos") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE requisitante = '{$IdUsuario}' AND histPro = 0");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Usuario") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE requisitante = '{$IdUsuario}' AND histUsu = 0");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Admin") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE requisitante = '{$IdUsuario}' AND histAdm = 0");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Coordenador") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE requisitante = '{$IdUsuario}' AND histCoo = 0");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Aprovador") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE requisitante = '{$IdUsuario}' AND histDir = 0");

               }
           }

           if ($Historico)
           {

               $VerificaUsuario = new usuarios($IdUsuario, null);

               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Compras") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE histCom = 1");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Projetos") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE histPro = 1");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Usuario") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE (requisitante = '{$IdUsuario}' OR coordenador = '{$IdUsuario}' OR direcao = '{$IdUsuario}') AND histUsu = 1");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Admin") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE (requisitante = '{$IdUsuario}' OR coordenador = '{$IdUsuario}' OR direcao = '{$IdUsuario}') AND histAdm = 1");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Coordenador") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE (requisitante = '{$IdUsuario}' OR coordenador = '{$IdUsuario}' OR direcao = '{$IdUsuario}') AND Status = 3 AND histCoo = '1'");

               }
               if ($VerificaUsuario->SelecionaUsuario()[0]['token'] == "Aprovador") {
                   $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens` WHERE (requisitante = '{$IdUsuario}' OR coordenador = '{$IdUsuario}' OR direcao = '{$IdUsuario}') AND histDir = 1");

               }
           }

       }else{
           $this->selecionaOrdens = $mysql->query("SELECT * FROM `ordens`");

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
            }else
            if($this->ordens[$i]['Status'] == 8){

                $this->ordens[$i]['Status'] = "Não Autorizado Pelo Coordenador";
            }else
            if($this->ordens[$i]['Status'] == 9){

                $this->ordens[$i]['Status'] = "Não Autorizado Pelo Aprovador";
            }



        }

        return $this->ordens;

    }

    public function SelecionaOrdem()
    {

        return $this->ordens;

    }

}