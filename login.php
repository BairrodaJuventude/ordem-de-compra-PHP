<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logobranca.jpg">
    
    <link rel="stylesheet" href="css/login.css">

    <title>Login</title>
    
</head>

<body>
    <div class="login-container">
        <form action="php/my/validarLogin.php" method="post" class="login-form">
            <img src="img/bannerlogo.png" alt="">

            <h2>Login</h2>
            <div class="box-user">
                <input type="text" name="nome" required>
                <label>Usuário</label>
            </div>
            <div class="box-user">
                <input type="password" name="senha" required>
                <label>Senha</label>
            </div>

            <button type="submit" class="btn">
                Entrar
            </button>
            <p>Se tiver dificuldades para acessar o sistema, entre em contato com o TI pelo número <a href="https://wa.me/554834032703" class="whatsapp-link"> (48)3403-2703 </a>  .</p>
        </form>

    </div>

</body>

</html>