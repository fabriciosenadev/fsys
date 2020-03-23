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
    
    $saveDescription = saveDescription($data);
    $data['ids_value'] = $saveValues;
    $data['id_description'] = $saveDescription;
    
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
        $insert = "INSERT INTO historics(date, id_description, status, id_category, id_value, created_by, created_at)";
        $insert .= "VALUES('$date', '$id_description', '$status', $id_category, $id_value, $created_by, now())";
        
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
    $unique_id = uniqid(rand(), true);
    extract($data);
    
    if(isset($installments) && $installments)
    {
        $installments = (int) $installments;
        
        foreach($credit_installments as $i => $value_installment)
        {
            $current_installment = $i + 1;
            $insert = "INSERT INTO `values`(`value`, value_installment, installments, current_installment, unique_id, created_by, created_at)";
            $insert .= "VALUES($value, $value_installment, $installments, $current_installment, '$unique_id', $created_by, now())";
            //$insert = addslashes($insert);
            
            if(mysqli_query($connection, $insert))
            {
                $idCollection[] = mysqli_insert_id($connection);
            }
        }        
    }
    else
    {
        $insert = "INSERT INTO `values`(`value`, unique_id, created_by, created_at)";
        $insert .= "VALUES($value, '$unique_id', $created_by, now())";

        // $insert = addslashes($insert);
        if(mysqli_query($connection, $insert))
        {
            $idCollection[] = mysqli_insert_id($connection);
        }
    }
    return $idCollection;
}

/**
 * function saveDescription
 * @param array $data
 * @return int|Boolean
 */
function saveDescription($data)
{
    $connection = $GLOBALS['connection'];

    extract($data);

    $insert = "INSERT INTO descriptions(description, created_by, created_at)";
    $insert .= "VALUES('$description', $created_by, now())";
    
    if(mysqli_query($connection, $insert))
    {
        return mysqli_insert_id($connection);
    }

    
}