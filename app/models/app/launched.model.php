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

    $select = "SELECT h.id, h.date, c.category, c.applicable, pm.pay_method, h.value, h.status, h.description ";
    $select .= ",h.id_category ";
    $select .= "FROM historics AS h ";
    $select .= "JOIN categories AS c ON c.id = h.id_category ";
    $select .= "LEFT JOIN pay_method_historics AS pmh ON pmh.id_historic = h.id ";
    $select .= "LEFT JOIN pay_methods AS pm ON pm.id = pmh.id_pay_method ";
    $select .= "WHERE h.deleted_at IS NULL AND h.created_by = $created_by AND h.date between '$dateFrom' AND '$dateTo' ";
    $select .= isset($historic_id) ? "AND h.id = $historic_id " : " ";
    $select .= "ORDER BY h.date, c.category, h.created_at ASC";
    
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
    
    return mysqli_query($connection, $update);
    
}