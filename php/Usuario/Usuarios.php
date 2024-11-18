<?php


class usuarios
{
    private $selecionaUsuarios;
    private $usuarios;
    private Int $quantUsuarios;

    public function __construct($IdUsuario, $Aprovador)
    {
        include '../php/Configuracao/conexao.php';

        if ($IdUsuario){
            include '../php/Configuracao/conexao.php';
           $this->selecionaUsuarios = $mysql->query("SELECT * FROM usuarios WHERE ID = '{$IdUsuario}'");
        }
        if ($Aprovador){
            include '../php/Configuracao/conexao.php';
           $this->selecionaUsuarios = $mysql->query("SELECT * FROM usuarios WHERE token = '5' OR token2 = '5'");
        }
        if((!$IdUsuario)&&(!$Aprovador))
        {
            $this->selecionaUsuarios = $mysql->query("SELECT * FROM `usuarios` ORDER BY `usuarios`.`ID` DESC ");

        }
        $this->quantUsuarios = $this->selecionaUsuarios->num_rows;

        for ($i = 0; $i < $this->quantUsuarios;$i++){

            $this->usuarios[$i] = $this->selecionaUsuarios->fetch_assoc();


        }
    }

    public function getAll()
    {
        if ($this->quantUsuarios == 0)
        {
            $this->usuarios = "Nenhum Usuario Encontrado";
        }
        for ($i = 0; $i < $this->quantUsuarios;$i++){

            if ($this->usuarios[$i]['token'] == 1){

                $this->usuarios[$i]['token'] = "Admin";
            }else
                if ($this->usuarios[$i]['token'] == 3){

                $this->usuarios[$i]['token'] = "Usuario";
            }else
                if ($this->usuarios[$i]['token'] == 5){

                $this->usuarios[$i]['token'] = "Aprovador";
            }else
                if ($this->usuarios[$i]['token'] == 7){

                $this->usuarios[$i]['token'] = "Coordenador";
            }else
                if ($this->usuarios[$i]['token'] == 11){

                $this->usuarios[$i]['token'] = "Projeto";
            }else
                if ($this->usuarios[$i]['token'] == 12){

                $this->usuarios[$i]['token'] = "Compras";
            }else
                if ($this->usuarios[$i]['token'] == 13){

                $this->usuarios[$i]['token'] = "Almoxarifado";
            }
            if($this->usuarios[$i]['Status'] == 1){
                $this->usuarios[$i]['Status'] = "Ativado";
            }else{
                $this->usuarios[$i]['Status'] = "Desativado";
            }

        }



        return $this->usuarios;

    }

    public function SelecionaUsuario()
    {

        if ($this->quantUsuarios == 0)
        {
            $this->usuarios = "Nenhum Usuario Encontrado";
            return $this->usuarios;
        }

        for ($i = 0; $i < $this->quantUsuarios;$i++){

            if ($this->usuarios[$i]['token'] == 1){

                $this->usuarios[$i]['token'] = "Admin";
            }else
            if ($this->usuarios[$i]['token'] == 3){

                $this->usuarios[$i]['token'] = "Usuario";
            }else
            if ($this->usuarios[$i]['token'] == 5){

                $this->usuarios[$i]['token'] = "Aprovador";
            }else
            if ($this->usuarios[$i]['token'] == 7){

                $this->usuarios[$i]['token'] = "Coordenador";
            }else
            if ($this->usuarios[$i]['token'] == 11){

                $this->usuarios[$i]['token'] = "Projeto";
            }else
            if ($this->usuarios[$i]['token'] == 12){

                $this->usuarios[$i]['token'] = "Compras";
            }else
            if ($this->usuarios[$i]['token'] == 13){

                $this->usuarios[$i]['token'] = "Almoxarifado";
            }
            if($this->usuarios[$i]['Status'] == 1){
                $this->usuarios[$i]['Status'] = "Ativado";
            }else{
                $this->usuarios[$i]['Status'] = "Desativado";
            }

        }
        return $this->usuarios;
        

    }
}