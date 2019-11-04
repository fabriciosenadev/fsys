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
    $selectRelation = selectRelationUserCategory($data);
    //descobrir por que não está trazendo as categorias para o id_user
    var_dump($selectRelation);
    if (isset($data['category'])) {
        // $selectCategory = selectCategory($data);
    }

    return $selectRelation;
    if (!empty($selectRelation)) {
    }
    
    // $createCategory = createCategory($data);

    // return $createCategory;
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


function selectRelationUserCategory ($data)
{
    $connection = $GLOBALS['connection'];
    $return = [];

    extract($data);

    if (isset($category)) {

    }

    $selectRelation = "SELECT ct.id, ct.category, ct.applicable FROM category_users AS cat_us ";
    $selectRelation .= "JOIN categories AS ct ON cat_us.id_category = ct.id ";
    $selectRelation .= "WHERE cat_us.id_user = $id_user";

    $result = mysqli_query($connection, $selectRelation);
    while ($relation = mysqli_fetch_assoc($result)) {
        
        $return[] = $relation;

    }
    return $return;
}

/**
 * function selectCategory
 * @param array|null $data
 * @return array
 */
function selectCategory ($data) 
{
    $connection = $GLOBALS['connection'];
    $return = [];

    extract($data);

    // $where = isset($category) ? "AND category = '$category'" : '';
    if (isset($category)){

        $select = "SELECT * FROM categories WHERE deleted_at is null AND category = '$category'";
        
    
        $result = mysqli_query($connection, $select);
        while ($category = mysqli_fetch_assoc($result)) {
            
            $return[] = $category;
    
        }
    }
    return $return;
}



/**
 * function deleteCategory
 * @param int $idCategory
 * @return bool
 */
function deleteCategory ($idCategory) 
{
    $connection = $GLOBALS['connection'];
    
    $update = "UPDATE categories SET deleted_at = now() WHERE id = $idCategory";

    $result = mysqli_query($connection, $update);

    return $result;
}