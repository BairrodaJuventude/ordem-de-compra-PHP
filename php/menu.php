<?php 
include('conexao.php');

$ID = intval($_GET['ID']);

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
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='index.php?ID=$ID'>Home</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='enviar.php?ID=$ID'>Encaminhar Ordem</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='lista.php?ID=$ID'>Lista de Enviados</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../logout.php'>Sair</a></li>
        </ul>
    </nav>
</header>";

if ($ID == 57) {
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
                <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../index.php?ID=$ID'>Home</a></li>
                <li><a id='e' style='color:#ffffff;text-decoration: none;' href='admin.php?ID=$ID'>Admin</a></li>
                <li><a id='e' style='color:#ffffff;text-decoration: none;' href='enviar.php?ID=$ID'>Encaminhar Ordem</a></li>
                <li><a id='e' style='color:#ffffff;text-decoration: none;' href='lista.php?ID=$ID'>Lista de Enviados</a></li>
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
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='index.php?ID=$ID'>Home</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='admin.php?ID=$ID'>Admin</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='enviar.php?ID=$ID'>Encaminhar Ordem</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='lista.php?ID=$ID'>Lista de Enviados</a></li>
            <li><a id='e' style='color:#ffffff;text-decoration: none;' href='../logout.php'>Sair</a></li>
        </ul>
    </nav>
</header>";
?>

