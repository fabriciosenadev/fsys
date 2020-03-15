<?php
// criação das definições do banco de dados

require '../db/connect.php';

/**
 *  function saveLaunch
 *  @param array $data
 *  @return array
 */
function saveLaunch($data) 
{   
    $saveValues = saveValues($data);
    $data['ids_value'] = $saveValues;
    
    $createHistoricReturn = createHistoric($data);

    if ($createHistoricReturn && isset($data['id_pay_method'])) 
    {
        $data['ids_historic'] = $createHistoricReturn;

        $savePayMethodOutReturn = savePayMethodOut($data);

        return $savePayMethodOutReturn;
    }
    else 
    {
        return $createHistoricReturn;
    }
}

/**
 * function createHistoric
 * @param array $data
 * @return array
 */
function createHistoric($data)
{
    $connection = $GLOBALS['connection'];
    
    $idCollection = [];

    extract($data);

    foreach($ids_value as $id_value)
    {        
        $insert = "INSERT INTO historics(date, description, status, id_category, id_value, created_by, created_at)";
        $insert .= "VALUES('$date', '$description', '$status', $id_category, $id_value, $created_by, now())";
        
        if(mysqli_query($connection, $insert))
        {
            $idCollection[] = mysqli_insert_id($connection);
            $dateConverted1 = strtotime($date);
            $dateConverted2 = strtotime('+1 month', $dateConverted1);
            $date = date('Y-m-d',$dateConverted2);
        }
    }
    return $idCollection;
}

/**
 * function savePayMethodOut
 * @param array $data
 * @return array
 */
function savePayMethodOut($data)
{
    $connection = $GLOBALS['connection'];
    $idCollection = [];
    extract($data);
    
    foreach($ids_historic as $id_historic)
    {        
        $insert = "INSERT INTO pay_method_historics(id_historic, id_pay_method, created_by, created_at)";
        $insert .= "VALUES($id_historic, $id_pay_method, $created_by, now() )";
        if (mysqli_query($connection, $insert) ) 
        {
            $idCollection = mysqli_insert_id($connection);
        }
    }
    return $idCollection;
}

/**
 * function saveValues
 * @param array $data
 * @return array
 */
function saveValues($data)
{
    $connection = $GLOBALS['connection'];
    
    $insert = '';
    $idCollection = [];

    extract($data);
    
    if($installments)
    {
        $installments = (int) $installments;
        
        foreach($credit_installments as $i => $value_installment)
        {
            $current_installment = $i + 1;
            $insert = "INSERT INTO `values`(`value`, value_installment, installments, current_installment, created_by, created_at)";
            $insert .= "VALUES($value, $value_installment, $installments, $current_installment, $created_by, now())";
            $insert = addslashes($insert);
            
            if(mysqli_query($connection, $insert))
            {
                $idCollection[] = mysqli_insert_id($connection);
            }
        }        
    }
    else
    {
        $insert = "INSERT INTO values(value, created_by, created_at)";
        $insert .= "VALUES($value, $created_by, now())";

        if(mysqli_query($connection, $insert))
        {
            $idCollection[] = mysqli_insert_id($connection);
        }
    }
    return $idCollection;
}