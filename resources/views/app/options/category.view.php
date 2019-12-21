
    <!-- <hr> -->
<?php
    // var_dump($errors);
?>
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
                        <h2>Minhas categorias</h2>
                        <div class="col" style="margin:15px 0;">

                            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="inputCategory">Categoria</label>
                                        <input type="text" id="inputCategory"name="category" value="<?php echo $category;?>"
                                            class="form-control <?php echo $styleCategory;?>">
                                        <div class="valid-feedback">
                                            Parece bom!
                                        </div>  
                                        <div class="invalid-feedback">
<?php                                       
                                            echo ($errors['category']) 
                                                ?   $errors['category']
                                                :   null;
?>
                                        </div>  
                                </div>

                                <div class="form-group col-md-6">

                                    <label for="inputApplicable">Aplicável</label>
                                        <select id="inputApplicable" name="applicable"
                                            class="form-control <?php echo $styleApplicable;?>">
                                            <option value="">Escolha...</option>
                                            <option value="IN">Entrada</option>
                                            <option value="OUT">Saída</option>
                                        </select>
                                        <div class="valid-feedback">
                                            Parece bom!
                                        </div>
                                        <div class="invalid-feedback">
<?php                                       
                                            echo ($errors['applicable']) 
                                                ?   $errors['applicable']
                                                :   null;
?>
                                        </div>
                                </div>

                            </div>
                                    
                            <button type="submit" class="btn btn-success" name="btnSave">Salvar</button>

                            </form>
                        </div>

                        <div>                                
<?php
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

                                <table class="table table-striped">
                                    
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Categoria</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
<?php 
                                        foreach($categories as $category) {
                                            if($category['applicable'] == 'IN') {
                                                // $link = "?act=d&cat={$category['id']}";
?>
                                        <tr>
                                            <th scope="row"><?php echo $category['id']?></th>
                                            <td><?php echo $category['category']?></td>
                                            <td>
                                                <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                                                    <input type="hidden" name="delCategory" value="<?php echo $category['id']?>">
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

                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            
                            <table class="table table-striped">
                                    
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Categoria</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 
                                        foreach($categories as $category) {
                                            if($category['applicable'] == 'OUT') {
                                                // $link = "?act=d&cat={$category['id']}";
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $category['id']?></th>
                                            <td><?php echo $category['category']?></td>
                                            <td>
                                                <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                                                    <input type="hidden" name="delCategory" value="<?php echo $category['id']?>">
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
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-sm-2"></div>

        </div>
    </div>

    <!-- fim conteúdo do site -->


    <!-- fim container -->



