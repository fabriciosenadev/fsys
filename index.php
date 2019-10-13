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
$_SESSION['errors'] = [];

if($btnLogin){
    
    if ( empty($email) or empty($password) ) {
    
        //TODO: envia erros para exibir
        $_SESSION['errors'] = "Informe os dados de acesso";        
    
    } else {

        // faz a consulta no banco de dados
        $result = selectUser($email);

        if ($result['email'] == $email && $result['password'] == $password) {

        } else {
            $_SESSION['errors'] = "Usuário e/ou senha incorreto(s)";
        }
        // echo "<pre>";
        // var_dump($result);
        // echo "</pre>";
    
    }
    
}

if(!($_SESSION['errors'])){    
    include 'resources/views/site/index.view.php'; 
}else{
    header("Location: login.php");
}

// footer do site ==> não alterar
require_once 'resources/template/site/footer.php';