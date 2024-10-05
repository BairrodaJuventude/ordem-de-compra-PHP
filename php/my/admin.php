<?php
if(!isset($_SESSION)){
    session_start();
}
//      Filtro de usuario na pagina
if(isset($_SESSION['admin'])){
include('../conexao.php');
require('../menu.php');
?>

<?php }else{
    header("Location:../logout.php");
    die();
}