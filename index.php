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

$_SESSION['logged'] = false;
$_SESSION['errors'] = [];

if($btnLogin){
    
    if ( empty($email) or empty($password) ) {
    
        $_SESSION['errors'] = "Informe os dados de acesso";        
    
    } else {

        // faz a consulta no banco de dados
        $userData = selectUser($email);

        if ($userData['email'] == $email && $userData['password'] == $password) {
            $_SESSION['logged'] = true;
            $_SESSION['id_user'] = $userData['id'];
        } else {
            $_SESSION['errors'] = "Usuário e/ou senha incorreto(s)";
        }
    
    }
    
}


// redirecionamentos
if(!($_SESSION['errors'])){    
    include 'resources/views/site/index.view.php'; 
}else{
    header("Location: login.php");
}

if($_SESSION['logged']){
    header("Location: app/");
}

// footer do site ==> não alterar
require_once 'resources/template/site/footer.php';