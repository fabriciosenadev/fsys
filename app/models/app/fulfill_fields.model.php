<?php
// $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/fsys/';

// criação das definições do banco de dados
require '../db/connect.php';


/**
 *  function selectUser
 *  @param $login string
 *  @param $password string
 */
function selectCategories ($type_launch) 
{
    $connection = $GLOBALS['connection'];
    $data = [];

    $findCategories = "SELECT * FROM categories WHERE applicable = '$type_launch' ";
    $categories = mysqli_query($connection, $findCategories);

    

    while($category = mysqli_fetch_assoc($categories))
    {
        $data[] = $category;
    }
    // mysqli_close($connection);
    return $data;

}

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
    // mysqli_close($connection);   
    return $data;
}