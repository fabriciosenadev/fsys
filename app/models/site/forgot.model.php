<?php
// criação das definições do banco de dados
require 'db/connect.php';
/**
 * function tryReset
 * @param string $email
 */
function requestReset ($email)
{
    $returnSearch = searchEmail($email);

    if (!isset($returnSearch['email'])) {
        return $returnSearch;
    } 

    $returnRequest = createRequest($returnSearch);

    return $returnRequest;
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
    $insert .= "VALUES ( $id, '$token', NOW() )";

    if (mysqli_query($connection, $insert)) {
        $idRequest = mysqli_insert_id($connection);
    }

    return $idRequest;
    
}

/**
 * function searchEmail
 * @param string $email
 * @return array|null
 */
function searchEmail ($email)
{
    $connection = $GLOBALS['connection'];

    $select = "SELECT * FROM users WHERE email = '$email'";

    $result = mysqli_query($connection, $select);

    $data = mysqli_fetch_assoc($result);

    return $data;
}

/**
 * function tokenGenerate
 * @return string
 */
function tokenGenerate() {
    //Create a secure token for this forgot password request.
    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);

    return $token;
}