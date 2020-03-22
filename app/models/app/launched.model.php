<?php

// criação das definições do banco de dados
require '../db/connect.php';

/**
 * function selectLaunched
 * @param array $data
 * @return array
 */
function selectLaunched ($data)
{
    $connection = $GLOBALS['connection'];
    $return = [];

    extract($data);

    $select = "SELECT * FROM v_historic ";
    $select .= "WHERE created_by = $created_by AND date between '$dateFrom' AND '$dateTo' ";
    $select .= isset($historic_id) ? "AND id = $historic_id " : " ";
    $select .= "ORDER BY date, category, created_at ASC";
    $result = mysqli_query($connection, $select);
    
    while ($launchment = mysqli_fetch_assoc($result)) {
        
        $return[] = $launchment;

    }
    return $return;
}

/**
 * function changeStatus
 * @param array $data
 * @return boolean
 */
function changeStatus ($data) {
    $connection = $GLOBALS['connection'];

    extract($data);

    $update = "UPDATE historics SET status = '$status', updated_at = now() ";
    $update .= "WHERE id = $id";

    $result = mysqli_query($connection, $update);
    return $result;    
}

/**
 * function deleteRegister
 * @param int $id
 * @return boolean
 */
function deleteRegister ($id) {
    $connection = $GLOBALS['connection'];

    $update = "UPDATE historics SET deleted_at = now() ";
    $update .= "WHERE id = $id";

    $result = mysqli_query($connection, $update);
    return $result;    
}


function updateLaunch($data)
{
    $connection = $GLOBALS['connection'];

    extract($data);
    
    $update = "UPDATE historics SET date = '$date', id_category = $id_category, ";
    $update .= "description = '$description', value = $value, ";
    $update .= "status = '$status', created_by = $created_by, updated_at = now() ";
    $update .= "WHERE id = $historic_id";
    
    if(isset($id_pay_method))
    {
        if(mysqli_query($connection, $update))
        {
            $update = "UPDATE pay_method_historics SET id_pay_method = $id_pay_method, ";
            $update .= "updated_at = now() ";
            $update .= "WHERE id_historic = $historic_id";

            return mysqli_query($connection, $update);
        }
    }
    else
    {
        return mysqli_query($connection, $update);    
    }
}