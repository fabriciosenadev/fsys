<?php
    // get link param
    $currentPage = explode("/", $_SERVER['REQUEST_URI']);

    $pageCashIn = in_array("cash_in.php", $currentPage);
    $pageCashOut = in_array("cash_out.php", $currentPage);
    $pageSearch = in_array("search.php", $currentPage);
    $pageIndex = in_array("index.php", $currentPage);
    $pageCategory = in_array("category.php", $currentPage);
    // var_dump($currentPage);
    
    if ($pageCashIn or $pageCashOut or $pageSearch or $pageIndex) {
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