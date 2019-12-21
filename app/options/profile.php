<?php
session_start();
require_once '../../resources/template/app/header.php';
require_once '../models/app/options/reset_password.model.php';

if (!$_SESSION['logged']) {
    $_SESSION['errors'] = "Faça login primeiro";
    header("Location: ../../login.php");
}

$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;
$verify = isset($_REQUEST['verify']) ? $_REQUEST['verify'] : null;
$btnAlter = isset($_REQUEST['btnAlter']) ? $_REQUEST['btnAlter'] : null;

$stylePassword = $styleVerify = $securePass = '';
$errors = [];
$msg = isset($_SESSION['success']) ? $_SESSION['success']: null ;
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

if($btnAlter) {
    if (strlen($password) < 8) {
        $errors['password'] = "Informe a senha";
        $stylePassword = "is-invalid";
    }
    if (strlen($verify) < 8) {
        $errors['verify'] = "Repita a mesma senha";
        $styleVerify = "is-invalid";
    }

    if ($password != $verify) {
        $errors['verify'] = "Repita a mesma senha";
        $styleVerify = "is-invalid";
        $stylePassword = "is-invalid";
    }


    if (count($errors) > 0 and strlen($password) >= 8) {
        $stylePassword = "is-valid";
    }
    if (count($errors) > 0 and strlen($verify) >= 8) {
        $styleVerify = "is-valid";
    }

    if (!$errors) {
        $securePass = password_hash($password, PASSWORD_DEFAULT);

        // $dataSave['name'] = $name;
        $dataRequest['id_user'] = $id;
        $dataRequest['password'] = $securePass;

        $resultRequest = RequestNewPassword($dataRequest);

        $validateTimeStart = date("Y-m-d H:i:s", strtotime('-2 hours'));
        $validateTimeEnd = date("Y-m-d H:i:s");
        $dateRequest = $resultRequest['created_at'];

        if (strtotime($dateRequest) >= strtotime($validateTimeStart) && strtotime($dateRequest) <= strtotime($validateTimeEnd)) {
            
            $resultSetNew = SetNewPassword($dataRequest);
            if($resultSetNew) {
                $_SESSION['success'] = "Senha alterada.";
                header("Location: profile.php");
            }
        }

    }
}



include '../../resources/views/app/options/profile.view.php'; 


require_once '../../resources/template/app/footer.php';