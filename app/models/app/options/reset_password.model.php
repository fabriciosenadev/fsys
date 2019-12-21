<?php
// criação das definições do banco de dados
require '../../db/connect.php';


/**
 * function changeUser
 * @param array $data
 */
function requestNewPassword ($data) {
    $connection = $GLOBALS['connection'];

    // extract($data);

    if (!isset($idToken)) {
        $idToken = createRequest($data);
    }
    
    $created_at = tokenCheck($idToken);

    return $created_at;
    
}

function setNewPassword($data) {
    $connection = $GLOBALS['connection'];

    extract($data);

    $update = "UPDATE users SET password = '$password', updated_at = now() ";
    $update .= "WHERE id = $id_user";

    return mysqli_query($connection, $update);
}


function tokenGenerate() {
    //create a token to the user
    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);

    return $token;
}

/**
 * function saveRequest
 * @param array $data
 * @return int|bool
 */
function createRequest($data)
{
    $connection = $GLOBALS['connection'];

    extract($data);

    $token = tokenGenerate();

    $insert = "INSERT INTO user_password_resets(id_user, token, created_at) ";
    $insert .= "VALUES ( $id_user, '$token', NOW() )";

    if (mysqli_query($connection, $insert)) {
        $idRequest = mysqli_insert_id($connection);
    }

    return $idRequest;
    
}

function tokenCheck($idToken) {
    $connection = $GLOBALS['connection'];

    $select = "SELECT * FROM user_password_resets ";
    $select .= "WHERE id = '$idToken' ";
    $result = mysqli_query($connection, $select);
    $data = mysqli_fetch_array($result);
    return $data;
}