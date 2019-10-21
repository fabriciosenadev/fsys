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


// echo "<pre>";
// var_dump($_REQUEST);
// echo "</pre>";

// fields
$date = isset($_REQUEST['date']) ? $_REQUEST['date'] : null;
$category = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;
$description = isset($_REQUEST['description']) ? $_REQUEST['description'] : null;
$payMethod = isset($_REQUEST['payMethod']) ? $_REQUEST['payMethod'] : null;
$value = isset($_REQUEST['value']) ? $_REQUEST['value'] : null;

$btnSave = isset($_REQUEST['btnSave']) ? $_REQUEST : null;


// TODO: criar erros



//TODO: criar metodo de retorno de dados dos campos category e payMethod
$categories = selectCategories('OUT');    
$payMethods = selectPayMethod();

//TODO: criar metodo de gravação dos dados do lançamento



include '../resources/views/app/launch.form.view.php'; 


require_once '../resources/template/app/footer.php';