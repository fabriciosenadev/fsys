<?php
$db_server = "";
$db_user = "";
$db_pass = "";
$db_name = "";
$sql_file = 'db/fsys.sql';

$connection = mysqli_connect($db_server, $db_user, $db_pass);

$sql = "CREATE DATABASE IF NOT EXISTS fsys";
$check = mysqli_query($connection, $sql);

if($check) {
    // echo "It was created successfully";
    $command = 'mysql'
    . ' --host=' . $db_server
    . ' --user=' . $db_user
    . ' --password=' . $db_pass
    . ' --database=' . $db_name
    . ' --execute="SOURCE ' . $sql_file . '"';
    $output = shell_exec($command);
    
    echo $output;
}
// usar para criar banco de dados
// https://www.w3schools.com/php/php_mysql_create.asp

// executar .sql usando comandos
// https://stackoverflow.com/questions/4027769/running-mysql-sql-files-in-php

// header("Location: erro.php");
