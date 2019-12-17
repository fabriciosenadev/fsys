<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <!-- determina a largunra do site -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/ddb3ae0b46.js" crossorigin="anonymous"></script>

    <title>fsys</title>
</head>

<body style="background-color:#e9e9e9;">

    
    <!-- inicio container  -->
    <div class='container-fluid'>

        <!-- inicio top menu -->
        <?php
            $folders = explode("/", $_SERVER['REQUEST_URI']);
            $i = array_search('fsys',$folders);
            do{
                $i--;
                unset($folders[$i]);
            } while ( $i > 0);

            $count = count($folders);

            $go_back = 0;
            $dir = '';
            // check the current folder
            while($count > 3){
                $count--;
                $folders[$count];
                $go_back++;
            }
            //if the current folder will greates than 5 return one level
            while($go_back > 0){
                $dir = "../".$dir;
                $go_back--;
            }

            require_once 'top-menu.php';
        ?>
        <!-- fim top menu -->
    </div>