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
$nome = $usuario['nome'];



$base_header = "
<header>
    <nav>
         <img src='../../img/logobranca-transparente.png' id='logoMenu' class='logo'>

         <ul class='nav-list'>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../pages/index.php'>Home</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../pages/encaminharOrdem.php'>Encaminhar Ordem</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../pages/ordensEnviadas.php'>Ordens Enviadas</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../pages/ordensRecebidas.php'>Ordens Recebidas</a></li>
            <li id='nomeUser'>  $nome</li>
        </ul>

                <div class='sidebar'>
                <p onclick='toggleDropdown()'>
                <img src='../img/icons/person-circle.svg'></p>
                </p>
    
    <ul id='user-menu' class='dropdown'>
        <a href='../logout.php'>Logout</a></li>
    </ul>
</div>

    </nav>
</header>";

$pro_header = "
<header>
    <nav>
         <img src='../img/logopreta-transparente.png' id='logoMenu' class='logo'>

        <ul class='nav-list'>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../pages/index.php'>Home</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../pages/encaminharOrdem.php'>Encaminhar Ordem</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../pages/ordensEnviadas.php'>Ordens Enviadas</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../pages/ordensRecebidas.php'>Ordens Recebidas</a></li>
            <li id='nomeUser'>  $nome</li>
            <?php if($token == 11 || $token2 == 11){?>
           
        </ul>

                <div class='sidebar'>
                <p onclick='toggleDropdown()'>
                <img src='../img/icons/person-circle.svg'></p>
                </p>
    
    <ul id='user-menu' class='dropdown'>
            <li><a href='projetos.php'>Projetos</a></li>
        <a href='../logout.php'>Logout</a></li>
    </ul>
</div>
 
    </nav>
</header>";

$adm_header = "
<header>
    <nav>
        
            <img src='../img/logobranca-transparente.png' id='logoMenu' class='logo'>
        
        <ul class='nav-list'>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../pages/index.php'>Home</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../pages/encaminharOrdem.php'>Encaminhar Ordem</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../pages/ordensEnviadas.php'>Ordens Enviadas</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../pages/ordensRecebidas.php'>Ordens Recebidas</a></li>
            <li id='nomeUser'>  $nome</li>
        </ul>
        
      
        <div class='sidebar'>
            <p onclick='toggleDropdown()'>
            <img src='../img/icons/person-circle.svg'></p>
            <ul id='user-menu' class='dropdown'>
                    <li><a href='projetos.php'>
                    <img src='../img/icons/bank.svg'> Projetos</a>
                    <a href='../pages/config.php'>
                    <img src='../img/icons/gear.svg'> Configurações</a>
                    <a href='https://wa.me/554834032703'>
                    <img src='../img/icons/whatsapp.svg'> Suporte</a>
                    <a href='../php/logout.php'>
                    <img src='../img/icons/box-arrow-left.svg'> Logout</a></li>
            </ul>
        </div>

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

