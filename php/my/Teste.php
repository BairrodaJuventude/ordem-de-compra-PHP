<?php

session_start();

include ('../conexao.php');
require_once 'ServiceUsuarios.php';




$quantidadeUsuarios = count(listarsuarios()[0]);

for ($i =0; $i<$quantidadeUsuarios ; $i++)
{

    echo "<button>". listarsuarios()[0][$i]['ID'] ."</button>";
    echo " - ";
    echo "<button>". listarsuarios()[0][$i]['nome'] ."</button>";
    echo " - ";
    echo "<button>". listarsuarios()[0][$i]['token'] ."</button>";
    echo "<br>";

}




