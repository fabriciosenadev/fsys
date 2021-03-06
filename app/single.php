<?php
session_start();
require_once '../resources/template/app/header.php';
require_once "models/app/launched.model.php";


if (!$_SESSION['logged']) {
    $_SESSION['errors'] = "Faça login primeiro";
    header("Location: ../login.php");
}

$dateFrom = isset($_REQUEST['dateFrom']) ? $_REQUEST['dateFrom'] : null;
$dateTo = isset($_REQUEST['dateTo']) ? $_REQUEST['dateTo'] : null;
$historicId = isset($_REQUEST['historicId']) ? $_REQUEST['historicId'] : null;
$action = isset($_REQUEST['act']) ? $_REQUEST['act'] : null;
// $btnFilter = isset($_REQUEST['btnFilter']) ? $_REQUEST['btnFilter'] : null;
// $dataSelect = $dataChange = [];
$errors = '';

$msg = isset($_SESSION['success']) ? $_SESSION['success']: null ;
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}


//tratamento de ações do formulário
if ($action) {

    // ações
    $received = "received";
    $paid = "paid";
    $delete = "delete";

    // altera o status do registro
    if ($action == $received || $action == $paid) {
        
        $dataChange['status'] = $action == $received ? 'RECEIVED' : 'PAID';
        $dataChange['id'] = $historicId;

        $changeStatus = changeStatus($dataChange);

        if ($changeStatus) {
    
            $msgDefinition = $action == $received ? 'recebido' : 'pago';
            $_SESSION['success'] = "Registramos o valor $msgDefinition.";
            
            header("Location: launched.php?dateFrom=$dateFrom&dateTo=$dateTo&btnFilter=Filtrar");
        }
    }

    // adiciona deleted_at ao registro enviado
    if ($action == $delete) {

        $deleteRegister = deleteRegister($historicId);

        if($deleteRegister) {
            
            $_SESSION['success'] = "Registro removido.";
            
            header("Location: launched.php?dateFrom=$dateFrom&dateTo=$dateTo&btnFilter=Filtrar");
        }
    }

}

// filtra a busca para exibição
// if ($btnFilter) {

//     if (strtotime($dateFrom) > strtotime($dateTo)) {
//         $errors = "Data inicial menor que a final";
//     }

//     if (!$errors) {
//         $dataSelect['dateFrom'] = $dateFrom;
//         $dataSelect['dateTo'] = $dateTo;
//         $dataSelect['created_by'] = $_SESSION['id_user'];

//         $launches = selectLaunched($dataSelect);
//         // var_dump($launches);
//     }
// }
// seleciona os dados do lancamento que será alterado
if ($historicId)
{
    $dataSelect['historic_id'] = $historicId;
    $dataSelect['dateFrom'] = $dateFrom;
    $dataSelect['dateTo'] = $dateTo;
    $dataSelect['created_by'] = intval($_SESSION['id_user']);

    $result = selectLaunched($dataSelect);
    
    $date = $result[0]['date'];
    $idCategory = $result[0]['id_category'];
    $description = $result[0]['description'];
    $value = $result[0]['value'];
    $idPayMethod = $result[0]['id_pay_method'];

    $_SESSION['historicId'] = $historicId;
    $_SESSION['dateFrom'] = $dateFrom;
    $_SESSION['dateTo'] = $dateTo;
}


include '../resources/views/app/launched.view.php'; 


require_once '../resources/template/app/footer.php';