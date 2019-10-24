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
    $createOutReturn = createOut($data);

    if ($createOutReturn) {
        $data['id_historic'] = $createOutReturn;

        $savePayMethodOutReturn = savePayMethodOut($data);

    }

    return $savePayMethodOutReturn;

}

function createOut($data)
{
    $connection = $GLOBALS['connection'];

    extract($data);
    
    $insert = "INSERT INTO historics(date, id_category, description, value, created_by, created_at)";
    $insert .= "VALUES('$date', $id_category, '$description', $value, $created_by, now() )";

    if (mysqli_query($connection, $insert) ) {
        $IdHistoric = mysqli_insert_id($connection);
    }

    return $IdHistoric;

}

function savePayMethodOut($data)
{
    $connection = $GLOBALS['connection'];

    extract($data);

    $insert = "INSERT INTO pay_method_historics(id_historic, id_pay_method, created_by, created_at)";
    $insert .= "VALUES($id_historic, $id_pay_method, $created_by, now() )";

    if (mysqli_query($connection, $insert) ) {
        $IdPayMethodHistoric = mysqli_insert_id($connection);
    }

    return $IdPayMethodHistoric;

}