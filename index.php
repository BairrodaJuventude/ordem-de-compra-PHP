<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styl.css">
    <link rel="icon" href="img/a.jpg">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <form method="post" class="login-form">
            <h2>Login</h2>
            <?php
                if(isset($_POST['nome']) && (isset($_POST['senha']))){
                    include('php/conexao.php');
                    $nome = $mysql->escape_string($_POST['nome']);
                    $senha = $_POST['senha'];
                    $sql_code = "SELECT * FROM usuarios WHERE nome = '$nome'";
                    $sql_query = $mysql->query($sql_code) or die($mysql->error);
                    if($sql_query->num_rows == 0){
                        echo "<p class='error-msg'>Os Dados Informados Estão Incorretos.</p>";
                    }else{
                        $usuario = $sql_query->fetch_assoc();
                        if(password_verify($senha, $usuario['senha'])){
                            if(!isset($_SESSION)){
                                session_start();
                                $ID = $usuario['ID'];
                                if($usuario['token']==1)
                                {
                                    $_SESSION['admin'] = $usuario['ID'];
                                } else
                                {
                                    $_SESSION['usuario'] = $usuario['ID'];
                                }

                                if(isset($_SESSION['admin'])){
                                    header("location: php/my/index.php");
                                }else if(isset($_SESSION['usuario'])){
                                    header("location: php/my/index.php");
                                }
                            }
                        }else{
                            echo "<p class='error-msg'>Senha ou Usuário estão Incorretos.</p>";
                        }
                    }
                }
            ?>
            <div class="box-user">
                <input type="text" name="nome" required>
                <label>Usuário</label>
            </div>
            <div class="box-user">
                <input type="password" name="senha" required>
                <label>Senha</label>
            </div>
            <button type="submit" class="btn">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Entrar
            </button>
        </form>
    </div>
</body>
</html><!--teste commit
