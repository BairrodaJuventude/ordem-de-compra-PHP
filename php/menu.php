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

                <div class='sidebar'>
    <p onclick='toggleDropdown()'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-circle' viewBox='0 0 16 16'>
            <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0'/>
            <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1'/>
            </svg> </p>
    
    <ul id='user-menu' class='dropdown'>
        <a href='../logout.php'>Logout</a></li>
    </ul>
</div>

    </nav>
</header>";

$pro_header = "
<header>
    <>
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

                <div class='sidebar'>
    <p onclick='toggleDropdown()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-circle' viewBox='0 0 16 16'>
            <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0'/>
            <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1'/>
            </svg></p>
    
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

        <div class='sidebar'>
            <p onclick='toggleDropdown()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-circle' viewBox='0 0 16 16'>
            <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0'/>
            <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1'/>
            </svg></p>
            <ul id='user-menu' class='dropdown'>
                    <li><a href='projetos.php'>Projetos</a></li>
                    <li><a href='admin.php'>Configurações</a>
                <a href='../logout.php'>Logout</a></li>
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

