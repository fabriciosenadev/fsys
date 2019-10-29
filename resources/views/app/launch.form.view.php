<?php
    // get link param
    $currentPage = explode("/", $_SERVER['REQUEST_URI']);
    if ( in_array("cash_in.php", $currentPage) ) {
        $formTitle = 'Entrada';
        $borderTop = 'border-success';
        $valueTile = 'Valor de Entrada';
        $visible = false;
    } else {
        $formTitle = 'Saída';
        $borderTop = 'border-danger';
        $valueTile = 'Valor da Compra';
        $visible = true;
    }    
?>

    <!-- <hr> -->

    <!-- inicio  conteudo do site-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm">
                <?php include '../resources/template/app/side-menu.php';?>
            </div>

            <div class="col-md-8" id="main">
                <div class="row justify-content-center" style="margin-top:50px;">


                    <div class="border-top <?php echo $borderTop;?> rounded-bottom" 
                        style="width:500px;padding: 10px; background-color:white;">

                        <form method="post" action="<?php $_SERVER['PHP_SELF']?>">

                            <div class="form-row">

                                <div class="form-group col-md">
                                    <h2><?php echo $formTitle;?></h2>
                                </div>

                                <!-- <div class="form-group col-md-10">
                                    
                                </div> -->

                            </div>


                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="inputDate">Data</label>
                                        <input type="date" id="inputDate"name="date" value="<?php echo $date;?>"
                                            class="form-control <?php echo $styleDate;?>">
                                        <div class="valid-feedback">
                                            Parece bom!
                                        </div>  
                                        <div class="invalid-feedback">
<?php                                       
                                            echo ($errors['date']) 
                                                ?   $errors['date']
                                                :   null;
?>
                                        </div>  
                                </div>

                                <div class="form-group col-md-6">

                                    <label for="inputCategory">Categoria</label>
                                        <select id="inputCategory" name="category"
                                        class="form-control <?php echo $styleCategory;?>">
                                            <option value="">Escolha...</option>
<?php
                                            foreach ($categories as $category) {
                                                $selected = ($idCategory == $category['id']) ? 'selected':'' ;
?>                                                  
                                                <option value="<?php echo $category['id']; ?>"
                                                    <?php echo $selected;?>>
                                                    <?php echo $category['category'];?>
                                                </option>
<?php
                                            }
?>
                                        </select>
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

                            </div>

                            <div class="form-group">
                                
                                <label for="inputDescription">Descrição</label>
                                    <input type="text" class="form-control" id="inputDescription" value="<?php echo $description;?>" 
                                        placeholder="Ex:.compras do mês" name="description">

                            </div>

                            <div class="form-row">
                        
                                <div class="form-group col-md-6">
                                    <label for="inputValue"><?php echo $valueTile; ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">R$</div>
                                        </div>
                                        <input type="text" id="inputValue" name="value" step="0.01" value="<?php echo $value;?>"
                                            placeholder="1,57" class="form-control  <?php echo $styleValue;?>" >
                                        
                                        <div class="valid-feedback">
                                            Parece bom!
                                        </div>
                                        <div class="invalid-feedback">
<?php                                       
                                            echo ($errors['value']) 
                                                ?   $errors['value']
                                                :   null;
?>
                                        </div> 
                                    </div>

                                </div>

<?php 
                            if ($visible) {
?>
                                <div class="form-group col-md-6">
                                    <label for="inputPayMethod">Forma de Pagamento</label>
                                        <select id="inputPayMethod" name="payMethod" 
                                            class="form-control <?php echo $stylePayMethod;?>">
                                            <option value="">Escolha...</option>
<?php
                                            foreach ($payMethods as $payMethod) {
                                                $selected = ($idPayMethod == $payMethod['id']) ? 'selected':'' ;
?>
                                                <option value="<?php echo $payMethod['id']; ?>"
                                                    <?php echo $selected;?>>
                                                    <?php echo $payMethod['pay_method'];?>
                                                </option>
<?php
                                            }
?>                                            
                                        </select>
                                        <div class="valid-feedback">
                                            Parece bom!
                                        </div>
                                        <div class="invalid-feedback">
<?php                                       
                                            echo ($errors['payMethod']) 
                                                ?   $errors['payMethod']
                                                :   null;
?>
                                        </div>                                         
                                </div>
<?php
                            }
?>
                            </div>

                             <div class="form-row">

                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-success" name="btnSave">Salvar</button>    
                                </div>

                            </div>

                             <div class="form-row">
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
                            </div>
                        </form>
                    </div>

                </div>

            </div>

            <div class="col-sm-2"></div>

        </div>
    </div>

    <!-- fim conteúdo do site -->


    <!-- fim container -->



