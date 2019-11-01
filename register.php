<?php

// header do site ==> não alterar
require_once 'resources/template/site/header.php';

// var_dump($_REQUEST);
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;
$verify = isset($_REQUEST['verify']) ? $_REQUEST['verify'] : null;
$btnRegister = isset($_REQUEST['btnRegister']) ? $_REQUEST['btnRegister'] : null;

$errors = [];

if ($btnRegister) {
    
    // errors
    if (empty($name)) {
        $errors['name'] = "Preencha seu nome completo";
    }
    if (empty($email)) {
        $errors['email'] = "Informe um e-mail válido";
    }
    if (empty($password)) {
        $errors['password'] = "Informe a senha";
    }
    if (empty($verify)) {
        $errors['verify'] = "Repita a mesma senha";
    }

}


include 'resources/views/site/register.view.php'; 

// footer do site ==> não alterar
require_once 'resources/template/site/footer.php';