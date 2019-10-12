<?php
$db_server = "localhost";
$db_user = "fabricio";
$db_pass = "2um0n3ry";
$db_name = "fsys";

$connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if(mysqli_connect_error()){
    echo "Falha na conexao: ".mysqli_connect_error();

    header("Location: erro.php");
}