<?php
// $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/fsys/';

// criação das definições do banco de dados
require 'db/connect.php';
require_once 'categoryToRegister.model.php';
require_once 'houseToUser.model.php';

/**
 * function saveUser
 * @param array $data
 * @return array|int|boolean
 */
function saveUser ($data) 
{

    $selectUser = selectUser($data);

    if (!empty($selectUser)) {
        
        return $selectUser;
    }

    $createUser = createUser($data);
    // var_dump($createUser);
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
    // var_dump($data);
    $insert = "INSERT INTO users(name, email, password, created_at)";
    $insert .= "VALUES('$name', '$email', '$password', now() )";
        
    if (mysqli_query($connection, $insert)) {
        $idUser = mysqli_insert_id($connection);
        categoriesToNewUser($idUser);
        houseToUser($idUser);
    }
    // var_dump($idUser);
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
    
    $result = mysqli_query($connection, $select);
    while ($category = mysqli_fetch_assoc($result)) {
        
        $return[] = $category;

    }
    
    return $return;
}
