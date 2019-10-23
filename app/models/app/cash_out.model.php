<?php

// criação das definições do banco de dados
require '../db/connect.php';

/**
 *  function saveIn
 *  @param $data array
 *  @return $save boolean
 */
function saveOut($data) 
{
    $createReturn = createOut($data);

    if ($createReturn[0] == true) {



    }
    
    



}

function createOut($data)
{
    $connection = $GLOBALS['connection'];

    extract($data);
    $now = 'now()';
    $insert .= "INSERT INTO historics(date, id_category, description, value, created_by, created_at)";
    $insert .= "VALUES('$date', $id_category, $description, $value, $created_by, $now)";

    $save = mysqli_query($connection, $insert);

    return [$save, $now];

}

function selectOut($date)
{

}

function savePayMethodOut($id)
{
    
}