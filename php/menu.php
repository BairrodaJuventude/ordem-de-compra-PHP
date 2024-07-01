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

$base_header = "
<header>
    <nav>
        <a class='logo' style='color:#ffffff;text-decoration: none;transition: 0.3s;' href='/' >
            <img src='../../img/a.jpg' id='b' alt=''>
        </a>
        <div class='mobile-menu'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
        <ul class='nav-list'>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='index.php'>Home</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='enviar.php'>Encaminhar Ordem</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='lista.php'>Lista de Enviados</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../logout.php'>Sair</a></li>
        </ul>
    </nav>
</header>";

if ($token == 3) {
    $top = $base_header;
} else {
    $top = "
    <header>
        <nav>
            <a class='logo' style='color:#ffffff;text-decoration: none;transition: 0.3s;' href='/' >
                <img src='../../img/a.jpg' id='b' alt=''>
            </a>
            <div class='mobile-menu'>
                <div class='line1'></div>
                <div class='line2'></div>
                <div class='line3'></div>
            </div>
            <ul class='nav-list'>
                <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../index.php'>Home</a></li>
                <li><a id='e' style='color:#ffffff;text-decoration: none;' href='admin.php'>Admin</a></li>
                <li><a id='e' style='color:#ffffff;text-decoration: none;' href='lista.php'>Lista de Enviados</a></li>
                <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../logout.php'>Sair</a></li>
            </ul>
        </nav>
    </header>";
}

$top_adm = "
<header>
    <nav>
        <a class='logo' style='color:#ffffff;text-decoration: none;transition: 0.3s;' href='/' >
            <img src='../../img/a.jpg' id='b' alt=''>
        </a>
        <div class='mobile-menu'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
        <ul class='nav-list'>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='index.php'>Home</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='admin.php'>Admin</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='enviar.php'>Encaminhar Ordem</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='lista.php'>Lista de Enviados</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../logout.php'>Sair</a></li>
        </ul>
    </nav>
</header>";
?>

