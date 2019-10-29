<?php

require_once '../../resources/template/app/header.php';

session_start();
if (!$_SESSION['logged']) {
    $_SESSION['errors'] = "Faça login primeiro";
    header("Location: ../../login.php");
}


include '../../resources/views/app/options/category.view.php'; 


require_once '../../resources/template/app/footer.php';