<?php
    require_once '../php/Setor/ServiceSetor.php';
    include '../php/Configuracao/conexao.php';

if ($_POST)
{


    print_r(cadastraSetor());
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="" method="post">

    <input type="text" name="nomeSetor">
    <input type="number" name="rubrica[]">
    <input type="number" name="valorRubrica[]">
    <input type="number" name="rubrica[]">
    <input type="number" name="valorRubrica[]">
    <input type="submit">

</form>


</body>
</html>
