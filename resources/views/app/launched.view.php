
    <!-- <hr> -->

    <!-- inicio  conteudo do site-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm">
                <?php include '../resources/template/app/side-menu.php';?>
            </div>

            <div class="col-md-8" id="main">

                <div class="row justify-content-center" style="margin-top:10px;margin-bottom:10px;">

                    <form action="" method="get" class="form-inline">

                        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text">De</div>
                            </div>
                            <input type="date" class="form-control" name="dateFrom"
                                id="inlineFormInputGroupUsername2" placeholder="Username">
                        </div>

                        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text">Até</div>
                            </div>
                            <input type="date" class="form-control" name="dateTo"
                                id="inlineFormInputGroupUsername2" placeholder="Username">
                        </div>
                        

                        <!-- <label class="my-1 mr-2" for="inlineFormCustomSelectPref"></label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Preferencias</div>
                                </div>
                                <select class="form-control custom-select" id="inlineFormCustomSelectPref">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div> -->
                            

                        <!-- <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">Entrada</label>
                        </div>
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlInline2">
                            <label class="custom-control-label" for="customControlInline2">Saida</label>
                        </div> -->

                        <button type="submit" name="btnFilter" class="btn btn-success mb-2">Filtrar</button>

                    </form>

                </div>

                <!-- <div class="row justify-content-center" style="margin-top:50px;"> -->

<?php 
    if(isset($launches)) {
?>                  
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="in-tab" data-toggle="tab" href="#in" role="tab" aria-controls="in" aria-selected="false">Entrada</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="out-tab" data-toggle="tab" href="#out" role="tab" aria-controls="out" aria-selected="true">Saída</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="in" role="tabpanel" aria-labelledby="in-tab">

                     
                            <table class="table table-striped">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Descrição</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php 
                                    foreach($launches as $launch) {
                                        if($launch['applicable'] == 'IN') {
                                                // $link = "?act=d&cat={$category['id']}";
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $launch['id']?></th>
                                        <td><?php echo $launch['date']?></td>
                                        <td><?php echo $launch['category']?></td>
                                        <td><?php echo $launch['value']?></td>
                                        <td><?php echo $launch['description']?></td>
                                        <td>
                                            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                                                <input type="hidden" name="delCategory" value="<?php echo $launch['id']?>">
                                                <button type="submit" name="btnDelCategory" class="close" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>                    
                                            </form>
                                            <!-- <a href="<?php //echo $link;?>" >
                                            </a> -->
                                        </td>
                                    </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>

                            </table>

                        </div>

                        <div class="tab-pane fade" id="out" role="tabpanel" aria-labelledby="out-tab">
                            <table class="table table-striped">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Forma Pagto.</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Descrição</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php 
                                    foreach($launches as $launch) {
                                        if($launch['applicable'] == 'OUT') {
                                                // $link = "?act=d&cat={$category['id']}";
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $launch['id']?></th>
                                        <td><?php echo $launch['date']?></td>
                                        <td><?php echo $launch['category']?></td>
                                        <td><?php echo $launch['pay_method']?></td>
                                        <td><?php echo $launch['value']?></td>
                                        <td><?php echo $launch['description']?></td>
                                        <td>
                                            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                                                <input type="hidden" name="delCategory" value="<?php echo $launch['id']?>">
                                                <button type="submit" name="btnDelCategory" class="close" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>                    
                                            </form>
                                            <!-- <a href="<?php //echo $link;?>" >
                                            </a> -->
                                        </td>
                                    </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>

                            </table>
                        
                        </div>

                        <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> -->
                        
                    </div>                
<?php
    }
?>

                <!-- </div> -->


            </div>

            <div class="col-sm-2"></div>

        </div>
    </div>

    <!-- fim conteúdo do site -->


    <!-- fim container -->
