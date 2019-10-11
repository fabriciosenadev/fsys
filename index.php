<?php

// header do site ==> não alterar
require_once 'resources/template/site/header.php';

// require_once 'db/connect.php';
require_once "app/models/site/index.model.php";


// controller
session_start();
$login = isset($_POST['login']) ? $_POST['login'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$btnLogin = isset($_POST['btnLogin']) ? $_POST['btnLogin'] : null;
$_SESSION['errors']  = [];


if($btnLogin){
    if(empty($login) or empty($password)) {
        //TODO: envia erros para exibir
        $_SESSION['errors'] = "informe os dados de acesso";
        header("Location: login.php");
    }else{
        // faz a consulta no banco de dados
        ?>
        <pre>
            <?php var_dump($_POST);?>
        </pre>
        <?php
    }
}

if(!($_SESSION['errors'])){    
    include 'resources/views/site/index.view.php'; 
}

// footer do site ==> não alterar
require_once 'resources/template/site/footer.php';