<?php

// criação das definições do banco de dados
require '../db/connect.php';


function selectLaunched ($data)
{
    $connection = $GLOBALS['connection'];
    $return = [];

    extract($data);

    $select = "SELECT h.id, h.date, c.category, c.applicable, pm.pay_method, h.value, h.description ";
    $select .= "FROM historics AS h ";
    $select .= "JOIN categories AS c ON c.id = h.id_category ";
    $select .= "LEFT JOIN pay_method_historics AS pmh ON pmh.id_historic = h.id ";
    $select .= "LEFT JOIN pay_methods AS pm ON pm.id = pmh.id_pay_method ";
    $select .= "WHERE h.deleted_at IS NULL AND h.created_by = $created_by AND h.date between '$dateFrom' AND '$dateTo'";
    $select .= "ORDER BY h.date, c.category, h.created_at ASC";

    $result = mysqli_query($connection, $select);
    while ($launchment = mysqli_fetch_assoc($result)) {
        
        $return[] = $launchment;

    }
    return $return;
}