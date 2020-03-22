
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
                                        id="inlineFormInputGroupUsername2" placeholder="Username" 
                                        value="<?php echo $dateFrom; ?>" required>
                                </div>

                                <label class="sr-only" for="inlineFormInputGroupUsername2">Fim</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">Até</div>
                                    </div>
                                    <input type="date" class="form-control" name="dateTo"
                                        id="inlineFormInputGroupUsername2" placeholder="Username" 
                                        value="<?php echo $dateTo; ?>" required>
                                </div>
                                <input type="submit" name="btnFilter" class="btn btn-success mb-2" value="Filtrar">
                                <!-- <button type="submit" name="btnFilter" class="btn btn-success mb-2">Filtrar <i class="fas fa-search"></i> </button> -->

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

                            // sucesso
                            if ($msg) {
?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Sucesso!</strong> <?php echo $msg; ?>
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
                            
<?php
                        if (empty($launches)) {
?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Veja bem!</strong> Não encontramos resultados para esta pesquisa.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
<?php
                        } else {
?>
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
                                                    <!-- <th scope="col" width="20px">#</th> -->
                                                    <th scope="col" width="120px" class="text-center">Data</th>
                                                    <th scope="col" width="120px" class="text-center">Categoria</th>
                                                    <th scope="col" width="120px" class="text-center">Valor</th>
                                                    <th scope="col" class="text-center">Descrição</th>
                                                    <th scope="col" width="90px" class="text-center">Status</th>
                                                    <th scope="col" width="180px" class="text-center">Ações</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <?php 
                                                foreach($launches as $launch) {
                                                    if($launch['applicable'] == 'IN') {
                                                        $statusLink = "?act=received&historicId={$launch['id']}&dateFrom=$dateFrom&dateTo=$dateTo";
                                                        $deleteLink = "?act=delete&historicId={$launch['id']}&dateFrom=$dateFrom&dateTo=$dateTo";
                                                        $class = $launch['status'] == 'PENDING' ? 'bg-warning' : 'bg-success';
                                            ?>
                                                <tr>
                                                    <!-- <th scope="row"><?php echo $launch['id'];?></th> -->
                                                    <td><?php echo date("d/m/Y",strtotime($launch['date']));?></td>
                                                    <td><?php echo $launch['category'];?></td>
                                                    <td> 
                                                        R$ <?php echo number_format($launch['value'],2,',','.');?>
                                                    </td>
                                                    <td><?php echo $launch['description']; ?></td>
                                                    <td>
                                                        <div class=" text-center <?php echo $class;?>" style="padding:4px;border-radius:20px;color:white;">                                                        
                                                            <?php echo $launch['status'] == 'RECEIVED' ? 'Recebido' : 'Pendente';?>                                                        
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-sm">
                                                            <?php 
                                                                if($launch['status'] == 'PENDING') {
                                                            ?>
                                                                <a href="<?php echo $statusLink;?>" class="btn btn-sm btn-success" alt="Pago">
                                                                    <i class="far fa-check-square"></i>
                                                                </a>
                                                            <?php
                                                                }
                                                            ?>
                                                            </div>
                                                            <div class="col-sm">
                                                                <form action="cash_in.php" method="post">
                                                                    <input type="hidden" name="historicId" value="<?php echo $launch['id']; ?>">
                                                                    <input type="hidden" name="dateFrom" value="<?php echo $dateFrom; ?>">
                                                                    <input type="hidden" name="dateTo" value="<?php echo $dateTo; ?>">
                                                                    <button type="submit" class="btn btn-sm btn-warning">
                                                                        <i class="fas fa-pencil-alt text-white"></i>
                                                                    </button>
                                                                </form>
                                                            </div>  
                                                            <div class="col-sm">
                                                                <a href="<?php echo $deleteLink;?>" class="btn btn-sm btn-danger">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        </div>
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
                                                    <th scope="col" width="30px" class="text-center">#</th>
                                                    <th scope="col" >Data</th>
                                                    <!-- <th scope="col" width="120px">Categoria</th> -->
                                                    <th scope="col">Forma Pagto.</th>
                                                    <th scope="col" >Valor (R$)</th>                                                    
                                                    <!-- <th scope="col">Descrição</th> -->
                                                    <th scope="col" class="text-center">Status</th>
                                                    <!-- <th scope="col" width="180px" class="text-center">Ações</th> -->
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <?php 
                                                foreach($launches as $launch) {
                                                    if($launch['applicable'] == 'OUT') {
                                                        $statusLink = "?act=paid&historicId={$launch['id']}&dateFrom=$dateFrom&dateTo=$dateTo";
                                                        $deleteLink = "?act=delete&historicId={$launch['id']}&dateFrom=$dateFrom&dateTo=$dateTo";
                                                        $class = $launch['status'] == 'PENDING' ? 'bg-warning' : 'bg-success';
                                                        
                                                ?>
                                                <tr>
                                                    <th scope="row">
                                                    <!-- <?php echo $launch['id'];?> -->                                                        
                                                        <!-- <a href="#" class="btn btn-sm">
                                                            <i class="far fa-eye"></i>                                                        
                                                        </a> -->
                                                        <form action="single.php" method="post">
                                                            <input type="hidden" name="historicId" value="<?php echo $launch['id']; ?>">
                                                            <input type="hidden" name="dateFrom" value="<?php echo $dateFrom; ?>">
                                                            <input type="hidden" name="dateTo" value="<?php echo $dateTo; ?>">
                                                            <button type="submit" class="btn btn-sm">
                                                                <i class="far fa-eye"></i>
                                                            </button>
                                                        </form>
                                                    </th>
                                                    <td><?php echo date("d/m/Y",strtotime($launch['date']));?></td>
                                                    <!-- <td><?php echo $launch['category'];?></td> -->
                                                    <td><?php echo $launch['pay_method'];?></td>
                                                    <td>
                                                        <?php echo  
                                                            $launch['pm_applicable'] == 'CREDIT' ?
                                                            number_format($launch['value_installment'],2,',','.') :
                                                            number_format($launch['value'],2,',','.');
                                                        ?>
                                                    </td>
                                                    <!-- <td><?php 
                                                            $installmentsVisible = "[".$launch['current_installment'] ." de ". $launch['installments']. "]";
                                                            echo isset($launch['installments']) ? $installmentsVisible :  '';  
                                                            echo $launch['description'];
                                                        ?>
                                                    </td> -->
                                                    <td>
                                                        <div class=" text-center <?php echo $class;?>" style="padding:4px;border-radius:20px;color:white;min-width:80px;">                                                        
                                                            <?php echo $launch['status'] == 'PAID' ? 'Pago' : 'Pendente';?>                                                        
                                                        </div>
                                                    </td>
                                                    <!-- <td>
                                                        <div class="row justify-content-end">
                                                            <div class="col">
                                                                <?php 
                                                                if($launch['status'] == 'PENDING') {
                                                                    ?>
                                                                <a href="<?php echo $statusLink; ?>" class="btn btn-sm btn-success" alt="Pago">
                                                                <i class="far fa-check-square"></i>
                                                            </a>
                                                            <?php
                                                                    }
                                                                    ?>
                                                            </div>
                                                            <div class="col">
                                                                <form action="cash_out.php" method="post">
                                                                    <input type="hidden" name="historicId" value="<?php echo $launch['id']; ?>">
                                                                    <input type="hidden" name="dateFrom" value="<?php echo $dateFrom; ?>">
                                                                    <input type="hidden" name="dateTo" value="<?php echo $dateTo; ?>">
                                                                    <button type="submit" class="btn btn-sm btn-warning">
                                                                        <i class="fas fa-pencil-alt text-white"></i>
                                                                    </button>
                                                                </form>
                                                            </div>  
                                                            <div class="col">
                                                                <a href="<?php echo $deleteLink;?>" class="btn btn-sm btn-danger">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </a>
                                                            </div>

                                                        </div>
                                                        <br>
                                                        

                                                    </td>
                                                </tr> -->
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </tbody>

                                        </table>
                                    
                                    </div>
                                                    
                                </div>                
                            <?php
        }
                            ?>
                            </div>
                        
                        </div>

<?php
    }
?>                        
                    </div>

                <!-- </div>

            </div> -->

            <div class="col-md-2"></div>

        </div>
    </div>

    <!-- fim conteúdo do site -->

    <!-- fim container -->
