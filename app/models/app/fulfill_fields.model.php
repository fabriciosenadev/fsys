<?php
// $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/fsys/';

// criação das definições do banco de dados
require '../db/connect.php';

/**
 *  function selectCategories
 *  @param array $data
 *  @return array
 */
function selectCategories ($data) 
{
    $connection = $GLOBALS['connection'];
    $result = [];
    
    extract($data);
    
    $findCategories = "SELECT ct.id, ct.category, ct.applicable FROM category_users AS cat_us ";
    $findCategories .= "JOIN categories AS ct ON cat_us.id_category = ct.id ";
    $findCategories .= "WHERE ct.applicable = '$applicable' AND cat_us.id_user = $id_user ";
    $findCategories .= "AND cat_us.deleted_at IS NULL";
    $categories = mysqli_query($connection, $findCategories);    

    while($category = mysqli_fetch_assoc($categories))
    {
        $result[] = $category;
    }

    return $result;

}

/**
 * function select PayMethod
 * @return array
 */
function selectPayMethod ()
{
    $connection = $GLOBALS['connection'];
    $data = [];

    $findPayMethods = "SELECT * FROM pay_methods ";
    $PayMethods = mysqli_query($connection, $findPayMethods);    

    while($PayMethod = mysqli_fetch_assoc($PayMethods))
    {
        $data[] = $PayMethod;
    }

    return $data;
}