<?php
// Destroi todas as Sessoes ja criadas no navegador e redireciona para a pagina de login
include('../conexao.php');
    if(!isset($_SESSION)){
        session_start();

        session_destroy();
        header("location: ../login.php");
    }
