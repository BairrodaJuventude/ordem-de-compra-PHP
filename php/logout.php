<?php
// Destroi todas as Sessoes ja criadas no navegado e redireciona para a pagina de login
include('../conexao.php');
    if(!isset($_SESSION)){
        session_start();

        session_destroy();
        header("location: ../index.php");
    }