<?php



class Setor
{

    private $selecionaSetor;
    private $Setor;
    private int $quantSetor;


    public function __construct($IdSetor)
    {
        include '../php/Configuracao/conexao.php';

        if (isset($IdSetor)) {

            include '../php/Configuracao/conexao.php';
            $this->selecionaSetor = $mysql->query("SELECT * FROM setores WHERE ID = '{$IdSetor}'");

        }
        if (!isset($valor)) {

            $this->selecionaSetor = $mysql->query("SELECT * FROM `setores` ORDER BY `setores`.`ID` DESC ");

        }
        $this->quantSetor = $this->selecionaSetor->num_rows;

        for ($i = 0; $i < $this->quantSetor; $i++) {

            $this->Setor[$i] = $this->selecionaSetor->fetch_assoc();

        }
    }

    public function getAll()
    {
        if ($this->quantSetor == 0) {
            return "Nenhum Setor Cadastrado";
        }
        return $this->Setor;

    }

    public function SelecionaSetor()
    {

        return $this->Setor;

    }

}