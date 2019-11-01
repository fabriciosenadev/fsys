<?php

// criação das definições do banco de dados
require '../db/connect.php';

/**
 *  function saveLaunch
 *  @param array $data
 *  @return int|boolean
 */
function saveLaunch($data) 
{
    $createHistoricReturn = createHistoric($data);

    if ($createHistoricReturn && isset($data['id_pay_method'])) {
        $data['id_historic'] = $createHistoricReturn;

        $savePayMethodOutReturn = savePayMethodOut($data);

        return $savePayMethodOutReturn;
    } else {

        return $createHistoricReturn;

    }


}


/**
 * function createHistoric
 * @param array $data
 * @return int|boolean
 */
function createHistoric($data)
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

/**
 * function savePayMethodOut
 * @param array $data
 * @return int|boolean
 */
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