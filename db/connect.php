<?php
$db_server = "localhost";
$db_user = "fabricio";
$db_pass = "2um0n3ry";
$db_name = "fsys";

$query = '';

$connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

// erros
$error = "Falha na conexao: ".mysqli_connect_error();
$status = "Unknown";

if($error){
    // echo $error;
    $arrError = explode(" ",$error);
    if(in_array($status, $arrError)){
        // var_dump($arrError);

        $connection = mysqli_connect($db_server, $db_user, $db_pass);

        $sql = "CREATE DATABASE fsys";
        $check = mysqli_query($connection, $sql);
        if($check) {
            echo "It was created successfully";
        }
        // usar para criar banco de dados
        // https://www.w3schools.com/php/php_mysql_create.asp

        // executar .sql usando comandos
        // https://stackoverflow.com/questions/4027769/running-mysql-sql-files-in-php
    }
    // header("Location: erro.php");
}