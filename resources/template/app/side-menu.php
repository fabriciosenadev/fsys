<?php
    // get link param
    $currentPage = explode("/", $_SERVER['REQUEST_URI']);

    $launchMenu = [
        'cash_in.php',
        'cash_out.php',
        'launched.php',
        'dashboard.php'
    ];

    foreach ($launchMenu as $page) {
        if (in_array($page, $currentPage)) {
            launchMenu();
        }
    }      

    function launchMenu() 
    {
?>
        <div class="row py-2 sticky-top flex-grow-1 justify-content-center">
            <div class="btn-group-vertical" role="group" aria-label="Basic example">
                <a href="cash_in.php" class="btn btn-success">Entrada</a>
                <a href="cash_out.php" class="btn btn-success">Saída</a>
            </div>
        </div>
<?php
    }
  
    function optionMenu() 
    {
?>
        <div class="row py-2 sticky-top flex-grow-1 justify-content-center">
            <div class="btn-group-vertical" role="group" aria-label="Basic example">
                <a href="#" class="btn btn-success">Categorias</a>
                <a href="#" class="btn btn-success">Another option</a>
            </div>
        </div>
<?php
    }
?>