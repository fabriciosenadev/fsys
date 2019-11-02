<?php
// $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/fsys/';

// criação das definições do banco de dados
require 'db/connect.php';

/**
 * function saveUser
 * @param array $data
 * @return array|int|boolean
 */
function saveUser ($data) 
{

    $selectUser = selectUser($data);
    // var_dump($selectUser);
    if (!empty($selectUser)) {
        // echo "entrou no if";
        return $selectUser;
    }

    $createUser = createUser($data);

    return $createUser;

}

/**
 *  function savetUser
 *  @param array $data
 *  @param int|boolean 
 */
function createUser ($data) 
{
    $connection = $GLOBALS['connection'];

    extract($data);

    $insert = "INSERT INTO users(name, email, password, created_at)";
    $insert .= " VALUES ('$name', '$email', '$password', now() )";
        
    if (mysqli_query($connection, $insert)) {
        $idUser = mysqli_insert_id($connection);
    }
    
    return $idUser;

}

/**
 * function selectUser
 * @param array $data
 * @return array
 */
function selectUser($data) 
{
    $connection = $GLOBALS['connection'];
    $return = [];

    extract($data);

    $select = "SELECT * FROM users WHERE email = '$email'";
    // echo $select;
    $result = mysqli_query($connection, $select);
    while ($category = mysqli_fetch_assoc($result)) {
        
        $return[] = $category;

    }
    return $return;
}