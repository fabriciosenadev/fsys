<?php

require_once '../resources/template/app/header.php';

// inclusão dos models utilizados
require_once "models/app/fulfill_fields.model.php";

//controller
session_start();
if (!$_SESSION['logged']) {
    $_SESSION['errors'] = "Faça login primeiro";
    header("Location: ../login.php");
}

// fields
$date = isset($_REQUEST['date']) ? $_REQUEST['date'] : null;
$category = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;
$description = isset($_REQUEST['description']) ? $_REQUEST['description'] : null;
$value = isset($_REQUEST['value']) ? $_REQUEST['value'] : null;

$btnSave = isset($_REQUEST['btnSave']) ? $_REQUEST : null;

$_SESSION['errors'] = [];
$styleDate = $styleCategory = $styleValue = '';
$reload = false;
// echo "<pre>";
// var_dump($_REQUEST);
// var_dump($_SESSION['errors']);
// echo "</pre>";

// TODO: criar erros
if (empty($date)) {
    $_SESSION['errors']['date'] ="Preencha a data."; 
    $styleDate = 'is-invalid'; 
} 

if (empty($category)) {
    $_SESSION['errors']['category'] = "Escolha uma categoria.";
    $styleCategory = 'is-invalid';    
} 

if(empty($value)){
    $_SESSION['errors']['value'] = "Preencha o valor.";
    $styleValue = 'is-invalid';    
} else if($value < 0.01) {
    $_SESSION['errors']['value'] = "Valor muito baixo.";
    $styleValue = 'is-invalid';
}

if (count($_SESSION['errors']) > 0 && !(empty($date))){
    $styleDate = 'is-valid';
}

if (count($_SESSION['errors']) > 0 && !(empty($category))){
    $styleCategory = 'is-valid';
}

if (count($_SESSION['errors']) > 0 && !(empty($value))){
    $styleValue = 'is-valid';
}

// valida descrição enviada pelo usuário
if ($description) {
    $description = filter_var($description, FILTER_SANITIZE_STRING);
}


//TODO: criar metodo de gravação dos dados do lançamento
if ($btnSave) {
    if ($_SESSION['errors']) {
        $reload = true;
    }
}


// redirecionamentos
if($reload){
    // header("Location: cash_in.php");
}


//TODO: criar metodo de retorno de dados dos campos category e payMethod
$categories = selectCategories('IN');    
$payMethods = selectPayMethod();

include '../resources/views/app/launch.form.view.php'; 


require_once '../resources/template/app/footer.php';