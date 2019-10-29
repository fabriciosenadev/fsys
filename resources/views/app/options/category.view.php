<?php
    // get link param
    // $folders = explode("/", $_SERVER['REQUEST_URI']);
    // $i = array_search('fsys',$folders);
    // do{
    //     $i--;
    //     unset($folders[$i]);
    // } while ( $i > 0);

    // $count = count($folders);

    // $go_back = 0;
    // $dir = '';
    // // check the current folder
    // while($count > 2){
    //     $count--;
    //     $folders[$count];
    //     $go_back++;
    // }
    // //if the current folder will greates than 5 return one level
    // while($go_back > 0){
    //     $dir = "../".$dir;
    //     $go_back--;
    // }
?>

    <!-- <hr> -->

    <!-- inicio  conteudo do site-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm">
                <?php include '../../resources/template/app/side-menu.php';?>
            </div>

            <div class="col-md-8" id="main">
                <div class="row justify-content-center" style="margin-top:50px;">

                    <div class="border-top rounded-bottom" 
                        style="width:500px;padding: 10px; background-color:white;">


                        <form class="form-inline" action="<?php $_SERVER['PHP_SELF']?>" method="post">
                            <label class="sr-only" for="inlineFormInputName2">Categoria</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" 
                                    id="inlineFormInputName2" placeholder="Jane Doe">

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref"></label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Preferencias</div>
                                </div>
                                <select class="form-control custom-select" id="inlineFormCustomSelectPref">
                                    <option value="">Escolha...</option>
                                    <option value="IN">Entrada</option>
                                    <option value="OUT">Saída</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success mb-2">Salvar</button>

<?php
                            if(isset($_SESSION['success'])){
?>
                                <div class="form-group col-md">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Sucesso!</strong> <?php echo $_SESSION['success']?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
<?php
                            session_unset($_SESSION['success']);
                            }
?>

                        </form>



                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" 
                                    href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                    Entrada
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" 
                                    href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    Saída
                                </a>                                
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                <div class="row">
                                    
                                    <div class="col" style="margin: 20px 75px;padding-top:10px;">
                                
                                    Entrada...

                                    </div>
                                
                                </div>

                            </div>

                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            
                                <div class="row">
                                    
                                    <div class="col" style="margin: 20px 75px;padding-top:10px;">
                                
                                    saída...

                                    </div>
                                
                                </div>
                                
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-sm-2"></div>

        </div>
    </div>

    <!-- fim conteúdo do site -->


    <!-- fim container -->



