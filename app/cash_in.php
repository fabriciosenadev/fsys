<?php
session_start();
require_once '../resources/template/app/header.php';

// inclusão dos models utilizados
require_once "models/app/fulfill_fields.model.php";
require_once "models/app/cash_flow.model.php";
require_once "models/app/launched.model.php";

//controller

if (!$_SESSION['logged']) {
    $_SESSION['errors'] = "Faça login primeiro";
    header("Location: ../login.php");
}

// fields
$date = isset($_REQUEST['date']) ? $_REQUEST['date'] : null;
$idCategory = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;
$description = isset($_REQUEST['description']) ? $_REQUEST['description'] : null;
$value = isset($_REQUEST['value']) ? str_replace(',','.',$_REQUEST['value']) : null;
$value = floatval($value);

$btnSave = isset($_REQUEST['btnSave']) ? $_REQUEST : null;
// $_SESSION['success'] = isset($_SESSION['success']) ? $_SESSION['success'] : null;

$errors = $dataSave = [];
$styleDate = $styleCategory = $styleValue = '';
$reload = false;
$today = date("Y-m-d");

// dados vindo da alteração de lançamento
$historicId = isset($_REQUEST['historicId']) ? $_REQUEST['historicId'] : null;
$dateFrom = isset($_REQUEST['dateFrom']) ? $_REQUEST['dateFrom'] : null;
$dateTo = isset($_REQUEST['dateTo']) ? $_REQUEST['dateTo'] : null;
$dataSelect = [];


$msg = isset($_SESSION['success']) ? $_SESSION['success']: null ;
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

// seleciona os dados do lancamento que será alterado
if (!$btnSave && $historicId)
{
    $dataSelect['historic_id'] = $historicId;
    $dataSelect['dateFrom'] = $dateFrom;
    $dataSelect['dateTo'] = $dateTo;
    $dataSelect['created_by'] = intval($_SESSION['id_user']);

    $result = selectLaunched($dataSelect);

    // var_dump($result);
    $date = $result[0]['date'];
    $idCategory = $result[0]['id_category'];
    $description = $result[0]['description'];
    $value = $result[0]['value'];

    $_SESSION['historicId'] = $historicId;
    $_SESSION['dateFrom'] = $dateFrom;
    $_SESSION['dateTo'] = $dateTo;
}

//TODO: criar metodo de gravação dos dados do lançamento
if ($btnSave) {

        // TODO: criar erros
    if (empty($date)) {
        $errors['date'] ="Preencha a data."; 
        $styleDate = 'is-invalid'; 
    } 

    if (empty($idCategory)) {
        $errors['category'] = "Escolha uma categoria.";
        $styleCategory = 'is-invalid';    
    } 

    if(empty($value) || $value < 0.01){
        $errors['value'] = "Preencha o valor.";
        $styleValue = 'is-invalid';    
    } 

    if (count($errors) > 0 && !(empty($date))){
        $styleDate = 'is-valid';
    }

    if (count($errors) > 0 && !(empty($idCategory))){
        $styleCategory = 'is-valid';
    }

    if (count($errors) > 0 && !(empty($value))){
        $styleValue = 'is-valid';
    }

    // valida descrição enviada pelo usuário
    $description = $description ? filter_var($description, FILTER_SANITIZE_STRING) : 'null';

    // metodo de gravação de dados
    if(!($errors)) {
        $dataSave['date'] = $date;
        $dataSave['id_category'] = $idCategory;
        $dataSave['description'] = $description;
        $dataSave['value'] = $value;
        $dataSave['created_by'] = intval($_SESSION['id_user']);
        $dataSave['status'] = strtotime($date) > strtotime($today) ? 'PENDING' : 'RECEIVED';
        $dataSave['historic_id'] = isset($_SESSION['historicId']) ? $_SESSION['historicId'] : null;

        $result = isset($_SESSION['historicId']) ? updateLaunch($dataSave) : $result = saveLaunch($dataSave);
        
        if($result) {
            
            if(isset($_SESSION['historicId'])) 
            {
                $_SESSION['success'] = "Registro alterado.";
                $dateFrom = $_SESSION['dateFrom'];
                $dateTo = $_SESSION['dateTo'];
                unset($_SESSION['dateFrom'], $_SESSION['dateTo'], $_SESSION['historicId']);                
                header("Location: launched.php?dateFrom=$dateFrom&dateTo=$dateTo&btnFilter=Filtrar");
            }
            else 
            {
                $_SESSION['success'] = "Entrada registrada.";
                header("Location: cash_in.php");
            }
        }
    }

}


//TODO: criar metodo de retorno de dados dos campos category e payMethod
$dataSelect['applicable'] = 'IN';
$dataSelect['id_user'] = $_SESSION['id_user'];
$categories = selectCategories($dataSelect);    

include '../resources/views/app/launch.form.view.php'; 

require_once '../resources/template/app/footer.php';