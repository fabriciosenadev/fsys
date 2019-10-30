<?php

// criação das definições do banco de dados
require '../../db/connect.php';

function saveCategory ($category) 
{
    $ifExists = selectCategory($category);

}

function createCategory () 
{
    $connection = $GLOBALS['connection'];
}

/**
 * function selectCategory
 * @param string|null $category
 * @return array $data
 */
function selectCategory ($category) 
{
    $connection = $GLOBALS['connection'];
    $data = [];

    $where = $category ? "and category = $category" : '';
    
    $select = "SELECT * FROM categories WHERE deleted_at is null $where";
    
    $result = mysqli_query($connection, $select);
    while ($category = mysqli_fetch_assoc($result)) {
        
        $data[] = $category;

    }
    return $data;
}