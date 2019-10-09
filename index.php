<?php

// header do site ==> não alterar
require_once 'resources/template/site/header.php';

require_once 'db/connect.php';
require_once "app/models/site/index.model.php";


// controller
session_start();
$login              = isset($_POST['login']) ? $_POST['login'] : null;
$password           = isset($_POST['password']) ? $_POST['password'] : null;
$btnConnect         = isset($_POST['btnConnect']) ? $_POST['btnConnect'] : null;
$_SESSION['errors']  = [];

function search($login) {
   $result = 0 ;
}

function verify($login, $password){

}

if($btnConnect){
    if(empty($login) or empty($password)) {
        //TODO: envia erros para exibir
        $_SESSION['erros'][] = "erro";
    } else {
        
    }
}
if(!($_SESSION['errors'])){    
    include 'resources/views/site/index.view.php'; 
}else{
    header("Location: login.php");
}

// footer do site ==> não alterar
require_once 'resources/template/site/footer.php';