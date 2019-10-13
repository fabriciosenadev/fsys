<?php
// $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/fsys/';

// criação das definições do banco de dados
require 'db/connect.php';

function selectUser (
    $login, 
    $password = '') 
    {
        $connection = $GLOBALS['connection'];
        $addSearch = '';

        if (!(empty($password)) ) {
            $addSearch = "AND password = '$password'";
        }

        $search = "SELECT * FROM users WHERE email = '$login' ".$addSearch;
        $result = mysqli_query($connection, $search);
        $data = mysqli_fetch_array($result);
        
        return $data;
    }