<?php
$db_server = "localhost";
$db_user = "fabricio";
$db_pass = "2um0n3ry";
$db_name = "fsys";

$connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

//
$error = "Falha na conexao: ".mysqli_connect_error();

if($error){
    // echo $error;
    $arrError = explode(" ",$error);
    if(in_array("Unknown",$arrError)){
        var_dump($arrError);
        // https://www.w3schools.com/php/php_mysql_create.asp
        // usar para criar banco de dados
    }
    // header("Location: erro.php");
}