<?php
// criação das definições do banco de dados
require 'db/connect.php';
require 'sendEmail.model.php';

/**
 * function tryReset
 * @param string $email
 * @return boolean|null
 */
function requestReset ($email)
{
    $returnSearch = searchEmail($email);

    if (!isset($returnSearch['email'])) {

        return $returnSearch;

    } 

    $returnCreate = createRequest($returnSearch);

    if (!is_int($returnCreate)) {

        return $returnCreate;        

    }
    
    $returnSend = sendEmail ($returnSearch, $returnCreate);

    return $returnSend;

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