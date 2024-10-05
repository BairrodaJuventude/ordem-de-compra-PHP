
        <?php
        //            faz uma pesquisa no banco de dados para verificar se o usuario esta cadastrado

        if(isset($_POST['nome']) && (isset($_POST['senha']))){
            include('../conexao.php');
            $nome = $mysql->escape_string($_POST['nome']);
            $senha = $_POST['senha'];
            $sql_code = "SELECT * FROM usuarios WHERE nome = '$nome'";
            $sql_query = $mysql->query($sql_code) or die($mysql->error);
//                    Verifica se existe algum usuario com esse nome
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
                            header("location: ../../pages/index.php");
                        }else if(isset($_SESSION['usuario'])){
                            header("location: ../../pages/index.php");
                        }
                    }
                }else{
                    echo "<p class='error-msg'>Senha ou Usuário estão Incorretos.</p>";
                }
            }
        }
        ?>
      