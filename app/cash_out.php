<?php

require_once '../resources/template/app/header.php';

// inclusão dos models utilizados
require_once "models/app/fulfill_fields.model.php";
require_once "models/app/cash_flow.model.php";

//controller
session_start();
if (!$_SESSION['logged']) {
    $_SESSION['errors'] = "Faça login primeiro";
    header("Location: ../login.php");
}

// fields
$date = isset($_REQUEST['date']) ? $_REQUEST['date'] : null;
$idCategory = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;
$description = isset($_REQUEST['description']) ? $_REQUEST['description'] : null;
$idPayMethod = isset($_REQUEST['payMethod']) ? $_REQUEST['payMethod'] : null;

$value = isset($_REQUEST['value']) ? str_replace(',','.',$_REQUEST['value']) : null;
$value = floatval($value);

$btnSave = isset($_REQUEST['btnSave']) ? $_REQUEST : null;

$errors = [];
$styleDate = $styleCategory = $styleValue = $stylePayMethod ='';
$reload = false;


$msg = isset($_SESSION['success']) ? $_SESSION['success']: null ;
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
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

    if(empty($value)){
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

    if (empty($idPayMethod)) {        
        $errors['payMethod'] = "Escolha uma forma de pagamento.";
        $stylePayMethod = 'is-invalid';    
    } 

    if (count($errors) > 0 && !(empty($date))){
        $styleDate = 'is-valid';
    }

    if (count($errors) > 0 && !(empty($category))){
        $styleCategory = 'is-valid';
    }

    if (count($errors) > 0 && !(empty($value))){
        $styleValue = 'is-valid';
    }

    if (count($errors) > 0 && !(empty($idPayMethod))){
        $stylePayMethod = 'is-valid';
    }

    // valida descrição enviada pelo usuário
    $description = $description ? filter_var($description, FILTER_SANITIZE_STRING) : 'null';

    // metodo de gravação de dados
    if(!($errors)) {
        // echo "nothing of errors found";
        $dataSave['date'] = $date;
        $dataSave['id_category'] = $idCategory;
        $dataSave['description'] = $description;
        $dataSave['value'] = $value;
        $dataSave['id_pay_method'] = $idPayMethod;
        $dataSave['created_by'] = intval($_SESSION['id_user']);

        $result = SaveLaunch($dataSave);

        if($result) {
            $_SESSION['success'] = "Saída registrada.";
            header("Location: cash_out.php");
        }
    }

    // if ($_SESSION['errors']) {
    //     $reload = true;
    // }
}


// redirecionamentos
if($reload){
    // header("Location: cash_in.php");
}


//TODO: criar metodo de retorno de dados dos campos category e payMethod
$categories = selectCategories('OUT');    
$payMethods = selectPayMethod();

include '../resources/views/app/launch.form.view.php'; 


require_once '../resources/template/app/footer.php';