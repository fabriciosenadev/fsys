<?php

// header do site ==> não alterar
require_once 'resources/template/site/header.php';

require_once "app/models/site/forgot.model.php";

$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
$btnSend = isset($_REQUEST['btnSend']) ? $_REQUEST['btnSend'] : null;

$errors = '';

if ($btnSend){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors = "Digite um e-mail válido";
    } 

    if (!$errors) {
        $returnRequest = requestReset($email);
        var_dump($returnRequest);
        // if (is_null($returnSearch)){
        //     echo "Endereço de e-mail não localizado";
        // }


    }
}

include 'resources/views/site/forgot.view.php'; 

// footer do site ==> não alterar
require_once 'resources/template/site/footer.php'; 