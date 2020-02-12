<?php
    // get link param
    $currentPage = explode("/", $_SERVER['REQUEST_URI']);

    // $launchMenu = [
    //     'cash_in.php',
    //     'cash_out.php',
    //     'launched.php',
    //     'dashboard.php'
    // ];

    // $optionMenu = [
    //     'profile.php',
    //     'caregory.php'
    // ];
    
    if (!in_array('options', $currentPage))
    {
        launchMenu();        
    } else {
        optionMenu();
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
                <a href="profile.php" class="btn btn-success">Perfil</a>
                <a href="category.php" class="btn btn-success">Categorias</a>
                <!-- <a href="#" class="btn btn-success">Another</a> -->
            </div>
        </div>
<?php
    }
?>