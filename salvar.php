<?php
include "conexao.php";

$nome  =  $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario(nome,email,senha)
VALUES('$nome','$email','$senha')";

mysqli_query($conexao,$sql);

echo"Cadastro realizado com sucesso";
echo"<br><a href=\"index.php\">Voltar</a>";
?>