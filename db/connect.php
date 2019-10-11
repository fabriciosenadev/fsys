<?php
$nome_server = "localhost";
$nome_usuario = "fabricio";
$senha = "2um0n3ry";
$base_nome = "fsys";

$conexao = mysqli_connect($nome_server, $nome_usuario, $senha, $base_nome);

if(mysqli_connect_error()){
    echo "Falha na conexao: ".mysqli_connect_error();

    header("Location: erro.php");
}