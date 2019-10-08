<?php

require_once 'resources/template//site/header.php';

$error = isset($error) ? $error : null;

if(!($error))
{
    include 'resources/views/AboutView.php'; 
}

require_once 'resources/template//site/footer.php';