<?php

require_once '../resources/template/app/header.php';

$error = isset($error) ? $error : null;

if(!($error))
{
    include '../resources/views/app/index.view.php'; 
}

require_once '../resources/template/app/footer.php';