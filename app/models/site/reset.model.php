<?php
// criação das definições do banco de dados
require 'db/connect.php';

function tryReset ($email)
{
    $returnSearch = searchEmail($email);
    var_dump($returnSearch);
    if (!isset($returnSearch['email'])) {
        return $returnSearch;
    } 

}

function searchEmail ($email)
{
    $connection = $GLOBALS['connection'];

    $select = "SELECT * FROM users WHERE email = '$email'";

    $result = mysqli_query($connection, $select);

    $data = mysqli_fetch_assoc($result);

    return $data;
}

function tokenGenerate() {
    //create a token to the user
}

function sendReset () 
{
    //send e-mail with toke to create new pass
}