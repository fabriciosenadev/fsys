<?php
// $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/fsys/';

// criação das definições do banco de dados
require 'db/connect.php';


/**
 *  function selectUser
 *  @param $login string
 *  @param $password string
 */
function selectUser ($login) 
    {
        $connection = $GLOBALS['connection'];

        $search = "SELECT * FROM users WHERE email = '$login'";
        $result = mysqli_query($connection, $search);
        $data = mysqli_fetch_array($result);
        
        mysqli_close($connection);

        return $data;
    }