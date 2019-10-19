<?php

require_once '../resources/template/app/header.php';

session_start();
if (!$_SESSION['logged']) {
    $_SESSION['errors'] = "Faça login primeiro";
    header("Location: ../login.php");
}


// echo "<pre>";
// var_dump($_REQUEST);
// echo "</pre>";
$date = isset($_REQUEST['date']) ? $_REQUEST['date'] : null;
$category = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;
$description = isset($_REQUEST['description']) ? $_REQUEST['description'] : null;
$payMethod = isset($_REQUEST['payMethod']) ? $_REQUEST['payMethod'] : null;
$value = isset($_REQUEST['value']) ? $_REQUEST['value'] : null;
$btnSave = isset($_REQUEST['btnSave']) ? $_REQUEST : null;

$class_date = empty($date) ? 'is_invalid' : 'is_valid';




include '../resources/views/app/launch.form.view.php'; 


require_once '../resources/template/app/footer.php';