<?php
    // get link param
    $currentPage = explode("/", $_SERVER['REQUEST_URI']);
    
    if (!in_array('options', $currentPage))
    {
        launchMenu();        
    } 
    else 
    {
        optionMenu();
    }

    function launchMenu() 
    {
?>
        <div class="row justify-content-center">
            <div class="accordion " id="accordionExample">

                <div class="card text-center text-white rounded" style="width:100px;">
                    
                    <div class="card-header bg-success" id="headingOne">
                        <button class="btn btn-sm text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h6 class="mb-0">
                                Novo
                            </h6>
                        </button>
                    </div>

                    <div id="collapseOne" class="collapse bg-transparent" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            
                            <div class="row py-2 sticky-top flex-grow-1 justify-content-center">
                                <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                    <a href="cash_in.php" class="btn btn-success">Entrada</a>
                                    <a href="cash_out.php" class="btn btn-success">Saída</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            
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