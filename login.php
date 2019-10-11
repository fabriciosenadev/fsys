<?php

require_once 'resources/template/site/header.php';

// controller
session_start();
$login = isset($_POST['login']) ? $_POST['login'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$btnLogin = isset($_POST['btnLogin']) ? $_POST['btnLogin'] : null;

if($btnLogin){
    var_dump($_POST);
    if(empty($login) or empty($password)) {
        //TODO: envia erros para exibir
        $_SESSION['errors'] = "informe os dados de acesso";
        header("Location: login.php");
    }else{
        // vfaz a consulta no banco de dados

    }
}
include 'resources/views/site/login.view.php'; 

require_once 'resources/template/site/footer.php';