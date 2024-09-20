<?php 
include('conexao.php');

if(isset($_SESSION['admin']))
{
    $ID = $_SESSION['admin'];
}else
{
    $ID = $_SESSION['usuario'];
}
$sql_usuarios ="SELECT * FROM usuarios WHERE ID = $ID";
$query_usuarios = $mysql->query($sql_usuarios) or die($mysql->error);
$usuario = $query_usuarios->fetch_assoc();

$token = $usuario['token'];
$token2 = $usuario['token2'];


$base_header = "
<header>
    <nav>
         <img src='../../img/logobranca-transparente.png' id='b' class='logo'>
        <div class='mobile-menu'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
        <ul class='nav-list'>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='index.php'>Home</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='enviar.php'>Encaminhar Ordem</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='lista.php'>Ordens Enviadas</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='recebidas.php'>Ordens Recebidas</a></li>
           
        </ul>
    </nav>
</header>";

$pro_header = "
<header>
    <nav>
         <img src='../../img/logobranca-transparente.png' id='b' class='logo'>
        <div class='mobile-menu'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
        <ul class='nav-list'>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='index.php'>Home</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='enviar.php'>Encaminhar Ordem</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='lista.php'>Ordens Enviadas</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='recebidas.php'>Ordens Recebidas</a></li>
            <?php if($token == 11 || $token2 == 11){?>
           
        </ul>
    </nav>
</header>";

$adm_header = "
<header>
    <nav>
        
            <img src='../../img/logobranca-transparente.png' id='b' class='logo'>
        
        <div class='mobile-menu'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
        <ul class='nav-list'>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='index.php'>Home</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='enviar.php'>Encaminhar Ordem</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='lista.php'>Ordens Enviadas</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='recebidas.php'>Ordens Recebidas</a></li>
        </ul>
    </nav>
</header>";

if ($token== 1 || $token2==1) {
    $top = $adm_header;
}elseif($token==11 || $token2==11){
    $top = $pro_header;
}else{
    $top = $base_header;
}

?>

