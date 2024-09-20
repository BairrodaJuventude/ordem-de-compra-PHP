<?php
$senha = "1234";
$criptografia = password_hash($senha, PASSWORD_DEFAULT);
 
echo $senha,"<br> ";
echo  $criptografia;