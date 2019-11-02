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

function categoriesToNewUser ($idUser) {
    $dataSave = [];
    $baseCategories = baseCategories();
    // $idUser = 1;
    $countBase = count($baseCategories);
    // var_dump(baseCategories());
    foreach ($baseCategories as $key => $value) {
        // $dataSave[$key] = $value;
        $i = $key ; 
        $firstCategories = $value;
        $firstCategories['created_by'] = $idUser;

        $result = createCategory($firstCategories);

    }

    var_dump($result);
    // if
    //  return true;

}

/**
 * function baseCategories
 * @return array
 */
function baseCategories() {

    return [
        [
            "category" => "Salario",
            "applicable" => "IN"
        ], [
            "category" => "Alimentacao",
            "applicable" => "OUT"
        ], [
            "category" => "Beleza",
            "applicable" => "OUT"
        ], [
            "category" => "Educacao",
            "applicable" => "OUT"
        ], [
            "category" => "Lazer",
            "applicable" => "OUT"
        ], [
            "category" => "Saude",
            "applicable" => "OUT"
        ], [
            "category" => "Transporte",
            "applicable" => "OUT"
        ]
    ];

}

/**
 * function createCategory
 * @param array $data
 * @return int|boolean
 */
function createCategory ($data) 
{
    $connection = $GLOBALS['connection'];

    extract($data);

    $insert = "INSERT INTO categories(category, applicable, created_by, created_at)";
    $insert .= "VALUES('$category', '$applicable', $created_by, now() )";

    if (mysqli_query($connection, $insert)) {
        $idCategory = mysqli_insert_id($connection);
    }

    return $idCategory;
}