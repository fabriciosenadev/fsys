<?php

require_once '../resources/template/app/header.php';
require_once "models/app/launched.model.php";

session_start();
if (!$_SESSION['logged']) {
    $_SESSION['errors'] = "Faça login primeiro";
    header("Location: ../login.php");
}


$dateFrom = isset($_REQUEST['dateFrom']) ? $_REQUEST['dateFrom'] : null;
$dateTo = isset($_REQUEST['dateTo']) ? $_REQUEST['dateTo'] : null;
$btnFilter = isset($_REQUEST['btnFilter']) ? $_REQUEST : null;

$dataSelect = $errors = [];


if ($btnFilter) {
    if (strtotime($dateFrom) > strtotime($dateTo)) {

    }

    if (!$errors) {
        $dataSelect['dateFrom'] = $dateFrom;
        $dataSelect['dateTo'] = $dateTo;

        $launches = selectLaunched($dataSelect);

        var_dump($launches);
    }
}
// var_dump (strtotime($dateFrom) < strtotime($dateTo)) ;
    // var_dump($dateFrom,$dateTo);
    // echo "funcionou";
    

    

include '../resources/views/app/launched.view.php'; 


require_once '../resources/template/app/footer.php';