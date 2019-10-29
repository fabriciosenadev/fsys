<?php
    // get link param
    $currentPage = explode("/", $_SERVER['REQUEST_URI']);

    $cash_in = in_array("cash_in.php", $currentPage);
    $cash_out = in_array("cash_out.php", $currentPage);
    $search = in_array("search.php", $currentPage);
    $index = in_array("index.php", $currentPage);
    $category = in_array("category.php", $currentPage);
    // var_dump($currentPage);
    
    if ($cash_in or $cash_out or $search or $index) {
        launchMenu();
    } 
    // if ($category) {
    //     optionMenu();
    // }    

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