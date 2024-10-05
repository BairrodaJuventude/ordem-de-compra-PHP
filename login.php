<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
    
</head>

<body>
    <div class="login-container">
        <form action="php/my/validarLogin.php" method="post" class="login-form">

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


    </div>

    </form>
    </div>
</body>

</html>