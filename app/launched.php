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



// filtra a busca para exibição
if ($btnFilter) {

    if (strtotime($dateFrom) > strtotime($dateTo)) {
        $errors['date'] = "Data inicial menor que a final";
    }

    if (!$errors) {
        $dataSelect['dateFrom'] = $dateFrom;
        $dataSelect['dateTo'] = $dateTo;
        $dataSelect['created_by'] = $_SESSION['id_user'];

        $launches = selectLaunched($dataSelect);
        // var_dump($launches);
    }
}

include '../resources/views/app/launched.view.php'; 


require_once '../resources/template/app/footer.php';