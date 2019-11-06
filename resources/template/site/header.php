<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <!-- determina a largunra do site -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS do Bootstrap 4.3.1 -->
    <link rel="stylesheet" href="resources/assets/css/bootstrap.css">

    <link rel="stylesheet" href="resources/assets/css/home.css">

    <link rel="stylesheet" href="resources/assets/css/sobre.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php 
    
    // pega o link, converte em array e conta os indices
    $script_name = explode('/',$_SERVER['SCRIPT_NAME']);
    $i = count($script_name);
    
    if($script_name[$i - 1] == 'login.php'){
        ?>
        <link rel="stylesheet" href="resources/assets/css/login.css">
        <?php
    }
    if($script_name[$i - 1] == 'register.php'){
        ?>
        <link rel="stylesheet" href="resources/assets/css/register.css">
        <?php
    }

    ?>
    
    <title>fsys</title>
</head>

<body>
    <!-- inicio container  -->
    <div class='container-fluid'>

        <!-- inicio top menu -->
        <?php
            switch ($script_name[$i - 1])
            {
                case 'login.php': $menu = false;
                    break;
                case 'register.php': $menu = false;
                    break;
                case 'forgot.php': $menu = false;
                    break;
                case 'reset.php': $menu = false;
                    break;
                default : $menu = true;
            }

            if ($menu) {
                require_once 'top-menu.php';
            }
            // if( ($script_name[$i - 1] != 'login.php') and ($script_name[$i - 1] != 'register.php') ){
            //     require_once 'top-menu.php';
            // }
        ?>
        <!-- fim top menu -->
    </div>