<?php
session_start();
require_once '../resources/template/app/header.php';


if (!$_SESSION['logged']) {
    $_SESSION['errors'] = "Faça login primeiro";
    header("Location: ../login.php");
}

include '../resources/views/app/index.view.php';

require_once '../resources/template/app/footer.php';