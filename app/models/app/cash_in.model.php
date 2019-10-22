<?php

// criação das definições do banco de dados
require '../db/connect.php';

/**
 *  function saveIn
 *  @param $data[] array
 */
function saveIn($data) 
{
    $connection = $GLOBALS['connection'];
    
    // echo "<pre>";
    // var_dump($data);
    // echo "</pre>";
    extract($data);

    $insert .= "INSERT INTO historics(date, id_category, description, value, created_by, created_at)";
    $insert .= "VALUE($date, $id_category, $description, $value, $created_by, now())";

    $save = mysqli_query($connection, $insert);

    if($save){
        // return true;
    }
    //  return false;
    echo $insert;



}