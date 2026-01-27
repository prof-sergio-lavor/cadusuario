<?php
$host = "localhost";
$usuario="root";
$senha = "";
$bd="cadastro";

$conexao = mysqli_connect($host,$usuario,$senha,$bd);
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

    
?>
