<?php

// header do site ==> não alterar
require_once 'resources/template/site/header.php';

require_once "app/models/site/register.model.php";

// var_dump($_REQUEST);
session_start();

$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;
$verify = isset($_REQUEST['verify']) ? $_REQUEST['verify'] : null;
$btnRegister = isset($_REQUEST['btnRegister']) ? $_REQUEST['btnRegister'] : null;

$styleName = $styleEmail = $stylePassword = $styleVerify = $securePass = '';
$errors = $dataSave = [];
$reload = false;

$msg = isset($_SESSION['success']) ? $_SESSION['success']: null ;
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

if ($btnRegister) {
    
    // errors
    if (strlen($name) < 10 ) {
        $errors['name'] = "Preencha seu nome completo";
        $styleName = "is-invalid";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Informe um e-mail válido";
        $styleEmail = "is-invalid";
    }
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


    if (count($errors) > 0 and strlen($name) >= 15) {
        $styleName = "is-valid";
    }
    if (count($errors) > 0 and filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $styleEmail = "is-valid";
    }
    if (count($errors) > 0 and !empty($password)) {
        $stylePassword = "is-valid";
    }
    if (count($errors) > 0 and !empty($verify)) {
        $styleVerify = "is-valid";
    }

    if (!$errors) {
        $securePass = password_hash($password, PASSWORD_DEFAULT);

        $dataSave['name'] = $name;
        $dataSave['email'] = $email;
        $dataSave['password'] = $securePass;

        $result = saveUser($dataSave);

        if (isset($result[0]['email'])) {
            $errors['email'] = "E-mail já cadastrado.";
            $styleEmail = "is-invalid";
        }

        if (is_int($result)) {
            $_SESSION['success'] = "Usuário foi cadastrado.";
            header("Location: register.php");
        }

    }

}


include 'resources/views/site/register.view.php'; 

// footer do site ==> não alterar
require_once 'resources/template/site/footer.php';