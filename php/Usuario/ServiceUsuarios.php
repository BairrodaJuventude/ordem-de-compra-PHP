<?php
require_once 'Usuarios.php';


function listarsuarios()
{

    $usuario = new usuarios();
    $usuarios[] = $usuario->getAll();




return $usuarios;


}
