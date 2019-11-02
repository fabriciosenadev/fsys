<?php

// header do site ==> não alterar
require_once 'resources/template/site/header.php';

// inclusão dos models utilizados
require_once "app/models/site/login.model.php";

// controller
session_start();

$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$btnLogin = isset($_POST['btnLogin']) ? $_POST['btnLogin'] : null;

$email = filter_var($email, FILTER_VALIDATE_EMAIL);
$securePass = password_hash($password, PASSWORD_DEFAULT);


$_SESSION['logged'] = false;
$reload = false;

if($btnLogin){
    
    if(empty($email) or empty($password)) {

        // envia erros para exibir
        $_SESSION['errors'] = "Informe os dados de acesso";
        $reload = true; 

    }else{
        
        // faz a consulta no banco de dados
        $userData = selectUser($email);
        
        // if ($userData['email'] == $email && $userData['password'] == $password) {
        if ($userData['email'] == $email && password_verify($password, $userData['password'])) {

            $_SESSION['logged'] = true;
            $_SESSION['id_user'] = $userData['id'];

        } else {

            $_SESSION['errors'] = "Usuário e/ou senha incorreto(s)";
            $reload = true;

        }

    }
}

// redirecionamentos
if($reload){
    header("Location: login.php");
}
if($_SESSION['logged']){
    header("Location: app/index.php");
}

include 'resources/views/site/login.view.php'; 

// footer do site ==> não alterar
require_once 'resources/template/site/footer.php';