<?php

// criação das definições do banco de dados
require $dir.'../db/connect.php';

function selectUser ($idUser) {
    $connection = $GLOBALS['connection'];

    $search = "SELECT * FROM users WHERE id = '$idUser'";
    $result = mysqli_query($connection, $search);
    $data = mysqli_fetch_array($result);
    
    mysqli_close($connection);

    return $data;
}