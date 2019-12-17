
    <!-- <hr> -->

    <!-- inicio  conteudo do site-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-2">
                <?php include '../resources/template/app/side-menu.php';?>
            </div>

            <div class="col-md-8" id="main">

                <div class="row" style="margin-top:10px;margin-bottom:10px;">

                    <div class="col">

                        <div class="row justify-content-center">

                            <form action="" method="get" class="form-inline">

                                <label class="sr-only" for="inlineFormInputGroupUsername2">Inicio</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">De</div>
                                    </div>
                                    <input type="date" class="form-control" name="dateFrom"
                                        id="inlineFormInputGroupUsername2" placeholder="Username" required>
                                </div>

                                <label class="sr-only" for="inlineFormInputGroupUsername2">Fim</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">Até</div>
                                    </div>
                                    <input type="date" class="form-control" name="dateTo"
                                        id="inlineFormInputGroupUsername2" placeholder="Username" required>
                                </div>

                                <button type="submit" name="btnFilter" class="btn btn-success mb-2">Filtrar</button>

                            </form>




                            </div>
<?php
                            if ($errors) {
?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Veja bem!</strong> <?php echo $errors; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
<?php
                                    
                            }
?>
                            </div>



                        </div>

                        
                        
<?php 
    if(isset($launches)) {
?>                  
                        <div class="row">

                            <div class="col">
                            
                                <div class="row">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="in-tab" data-toggle="tab" href="#in" role="tab" aria-controls="in" aria-selected="false">Entrada</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="out-tab" data-toggle="tab" href="#out" role="tab" aria-controls="out" aria-selected="true">Saída</a>
                                        </li>
                                    </ul>
                                </div>
                                

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="in" role="tabpanel" aria-labelledby="in-tab">

                                
                                        <table class="table table-striped">
                                            
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="20px">#</th>
                                                    <th scope="col" width="120px">Data</th>
                                                    <th scope="col" width="120px">Categoria</th>
                                                    <th scope="col" width="120px">Valor</th>
                                                    <th scope="col">Descrição</th>
                                                    <th scope="col" width="90px">Status</th>
                                                    <th scope="col" width="180px">Ações</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <?php 
                                                foreach($launches as $launch) {
                                                    if($launch['applicable'] == 'IN') {
                                                        // $link = "?act=d&cat={$category['id']}";
                                                        $class = $launch['status'] == 'PENDING' ? 'class = "bg-warning"' : 'class = "bg-success"';
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $launch['id'];?></th>
                                                    <td><?php echo $launch['date'];?></td>
                                                    <td><?php echo $launch['category'];?></td>
                                                    <td>R$ <?php echo number_format($launch['value'],2,',','.');?></td>
                                                    <td><?php echo $launch['description'];?></td>
                                                    <td <?php echo $class;?> style="color:white;">
                                                        <?php echo $launch['status'];?>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col">
                                                                <?php 
                                                                if($launch['status'] == 'PENDING') {
                                                                    ?>
                                                                <a href="<?php //echo $link;?>" class="btn btn-sm btn-success" alt="Pago">
                                                                <i class="far fa-check-square"></i>
                                                            </a>
                                                            <?php
                                                                    }
                                                                    ?>
                                                            </div>
                                                            <div class="col">
                                                                <a href="<?php //echo $link;?>" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </div>  
                                                            <div class="col">
                                                                <a href="<?php //echo $link;?>" class="btn btn-sm btn-danger">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                                                            <input type="hidden" name="delCategory" value="<?php echo $launch['id'];?>">
                                                            <button type="submit" name="btnDelCategory" class="close" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>                    
                                                        </form> -->

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
                                                <th scope="col" width="20px">#</th>
                                                    <th scope="col" width="120px">Data</th>
                                                    <th scope="col" width="120px">Categoria</th>
                                                    <th scope="col">Forma Pagto.</th>
                                                    <th scope="col" width="120px">Valor</th>
                                                    
                                                    <th scope="col">Descrição</th>
                                                    <th scope="col" width="90px">Status</th>
                                                    <th scope="col" width="180px">Ações</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <?php 
                                                foreach($launches as $launch) {
                                                    if($launch['applicable'] == 'OUT') {
                                                        // $link = "?act=d&cat={$category['id']}";
                                                        $class = $launch['status'] == 'PENDING' ? 'class = "bg-warning"' : 'class = "bg-success"';
                                                        
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $launch['id'];?></th>
                                                    <td><?php echo $launch['date'];?></td>
                                                    <td><?php echo $launch['category'];?></td>
                                                    <td><?php echo $launch['pay_method'];?></td>
                                                    <td>R$ <?php echo number_format($launch['value'],2,',','.');?></td>
                                                    <td><?php echo $launch['description'];?></td>
                                                    <td <?php echo $class;?> style="color:white;">
                                                        <?php echo $launch['status'];?>
                                                    </td>
                                                    <td>
                                                        <div class="row justify-content-end">
                                                            <div class="col">
                                                                <?php 
                                                                if($launch['status'] == 'PENDING') {
                                                                    ?>
                                                                <a href="<?php //echo $link;?>" class="btn btn-sm btn-success" alt="Pago">
                                                                <i class="far fa-check-square"></i>
                                                            </a>
                                                            <?php
                                                                    }
                                                                    ?>
                                                            </div>
                                                            <div class="col">
                                                                <a href="<?php //echo $link;?>" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </div>  
                                                            <div class="col">
                                                                <a href="<?php //echo $link;?>" class="btn btn-sm btn-danger">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                                                            <input type="hidden" name="delCategory" value="<?php echo $launch['id'];?>">
                                                            <button type="submit" name="btnDelCategory" class="close" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>                    
                                                        </form> -->

                                                    </td>
                                                </tr>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </tbody>

                                        </table>
                                    
                                    </div>
                                                    
                                </div>                
                            
                            </div>
                        
                        </div>

<?php
    }
?>                        
                        
                        
                        

                    </div>








                </div>


            </div>

            <div class="col-md-2"></div>

        </div>
    </div>

    <!-- fim conteúdo do site -->


    <!-- fim container -->
