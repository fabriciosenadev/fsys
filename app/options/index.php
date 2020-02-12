<?php
session_start();
require_once '../../resources/template/app/header.php';


if (!$_SESSION['logged']) {
    $_SESSION['errors'] = "Faça login primeiro";
    header("Location: ../../login.php");
}

header('Location: profile.php');


require_once '../../resources/template/app/footer.php';