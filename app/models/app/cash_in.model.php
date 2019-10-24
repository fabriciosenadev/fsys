<?php

// criação das definições do banco de dados
require '../db/connect.php';

/**
 *  function saveIn
 *  @param $data array
 *  @return $save boolean
 */
function saveIn($data) 
{
    $connection = $GLOBALS['connection'];
    
    extract($data);
    
    $insert = "INSERT INTO historics(date, id_category, description, value, created_by, created_at)";
    $insert .= "VALUES('$date', $id_category, '$description', $value, $created_by, now())";

    $save = mysqli_query($connection, $insert);

    return $save;
}