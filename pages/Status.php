<?php

include '../php/Configuracao/conexao.php';
require_once '../php/Usuario/ServiceUsuarios.php';


Status(pegaIdCriptUsuario($_GET['id']));