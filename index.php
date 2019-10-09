<?php

require_once 'resources/template/site/header.php';

$error = isset($error) ? $error : null;

if(!($error))
{
    include 'resources/views/site/index.view.php'; 
}

require_once 'resources/template/site/footer.php';