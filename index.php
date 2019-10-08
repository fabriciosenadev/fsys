<?php

require_once 'resources/template//site/header.php';

$error = isset($error) ? $error : null;

if(!($error))
{
    include 'resources/views/HomeView.php'; 
}

require_once 'resources/template//site/footer.php';