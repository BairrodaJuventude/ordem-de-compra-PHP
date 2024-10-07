<?php


class usuarios
{
    private $selecionaUsuarios;
    private $usuarios;
    private Int $quantUsuarios;


    public function __construct($caracteristica)
    {
        include '../php/conexao.php';

        if (isset($caracteristica)){
            include '../php/conexao.php';
           $this->selecionaUsuarios = $mysql->query("SELECT * FROM usuarios WHERE ID = {$caracteristica}");
        }
            $this->selecionaUsuarios = $mysql->query("SELECT * FROM `usuarios` ORDER BY `usuarios`.`ID` ASC ");


        $this->quantUsuarios = $this->selecionaUsuarios->num_rows;

        for ($i = 0; $i < $this->quantUsuarios;$i++){

            $this->usuarios[$i] = $this->selecionaUsuarios->fetch_assoc();

        }
    }

    public function getAll()
    {
        for ($i = 0; $i < $this->quantUsuarios;$i++){

            if ($this->usuarios[$i]['token'] == 1){

                $this->usuarios[$i]['token'] = "Admim";
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

                $this->usuarios[$i]['token'] = "Projetos";
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

    public function updateUser($nome, $senha, $tipoUsuario)
    {

        

    }
}