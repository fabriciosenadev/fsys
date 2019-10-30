<?php

// criação das definições do banco de dados
require '../../db/connect.php';

/**
 * function saveCategory
 * @param array $data
 * @return int|boolean 
 */
function saveCategory ($data) 
{
    $selectCategory = selectCategory($data);

    if (!empty($selectCategory)) {
        return $selectCategory;
    }
    $createCategory = createCategory($data);

    // return $callback;
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

/**
 * function selectCategory
 * @param array|null $data
 * @return array $data
 */
function selectCategory ($data) 
{
    $connection = $GLOBALS['connection'];
    $return = [];

    $where = isset($data) ? "and category = '{$data['category']}'" : '';
    
    $select = "SELECT * FROM categories WHERE deleted_at is null $where";

    $result = mysqli_query($connection, $select);
    while ($category = mysqli_fetch_assoc($result)) {
        
        $return[] = $category;

    }
    return $return;
}