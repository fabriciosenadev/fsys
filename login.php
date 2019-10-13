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

// if($btnLogin){
    
//     if ( empty($email) or empty($password) ) {
    
//         $_SESSION['errors'] = "Informe os dados de acesso";        
    
//     } else {

//         // faz a consulta no banco de dados
//         $userData = selectUser($email);

//         if ($userData['email'] == $email && $userData['password'] == $password) {
//             $_SESSION['logged'] = true;
//             $_SESSION['id_user'] = $userData['id'];
//         } else {
//             $_SESSION['errors'] = "Usuário e/ou senha incorreto(s)";
//         }
    
//     }
    
// }

// // redirecionamentos
// if($_SESSION['errors']){    
//     include_once 'resources/views/site/login.view.php';
//     unset($_SESSION['errors']);
// }

// if($_SESSION['logged'] and $_SESSION['errors']){
//     header("Location: app/");
// }












if($btnLogin){
    var_dump($_POST);
    if(empty($email) or empty($password)) {
        //TODO: envia erros para exibir
        $_SESSION['errors'] = "informe os dados de acesso";
        header("Location: login.php");
    }else{
        // vfaz a consulta no banco de dados

    }
}

// if(){
// }
include 'resources/views/site/login.view.php'; 

// footer do site ==> não alterar
require_once 'resources/template/site/footer.php';