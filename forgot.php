<?php

// header do site ==> não alterar
require_once 'resources/template/site/header.php';

require_once "app/models/site/forgot.model.php";

session_start();

$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
$btnSend = isset($_REQUEST['btnSend']) ? $_REQUEST['btnSend'] : null;

$errors = $styleEmail = '';

$msg = isset($_SESSION['success']) ? $_SESSION['success']: null ;
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

if ($btnSend){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors = "Digite um e-mail válido";
    } 

    if (!$errors) {
        
        $returnRequest = requestReset($email);

        if ($returnRequest){

            $_SESSION['success'] = "Solicitação enviada para o endereço informado,";
            $_SESSION['success'] .= " não esqueça de verificar o lixo eletrônico.";
            header("Location: forgot.php");

        } else {
            $errors = "Endereço de e-mail não localizado";
            $styleEmail = "is-invalid";
        }



    }
}

include 'resources/views/site/forgot.view.php'; 

// footer do site ==> não alterar
require_once 'resources/template/site/footer.php'; 