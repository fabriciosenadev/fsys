<?php
$db_server = "";
$db_user = "";
$db_pass = "";
$db_name = "";

$connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

//realiza tratamento unicode vindo do HTML
mysqli_set_charset($connection , "utf8");
// erros
$error = "Falha na conexao: ".mysqli_connect_error();

if(mysqli_connect_error()){
    echo $error;
    // $command = 'php ../db/build.bd.php';
    // shell_exec($command);
    // header("Location: erro.php");
}