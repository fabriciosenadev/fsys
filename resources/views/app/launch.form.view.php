<?php
    // get link param
    $currentPage = explode("/", $_SERVER['REQUEST_URI']);
    // $formTitle = in_array("cash_in.php", $currentPage) ? 'Entrada' : 'Saída';
    if ( in_array("cash_in.php", $currentPage) ) {
        $formTitle = 'Entrada';
        $borderTop = 'border-success';
        $visible = false;
    } else {
        $formTitle = 'Saída';
        $borderTop = 'border-danger';
        $visible = true;
    }
?>

    <!-- <hr> -->

    <!-- inicio  conteudo do site-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm px-1">
                <?php include '../resources/template/app/side-menu.php';?>
            </div>

            <div class="col-md-6" id="main">
                <div class="row justify-content-center" style="margin-top:50px;">


                    <div class="border-top <?php echo $borderTop;?> rounded-bottom" 
                        style="width:500px;padding: 10px; background-color:white;">

                        <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
                            <h2><?php echo $formTitle;?></h2>
                            <div class="error">
<?php 
                                if ($_SESSION['errors']) {
                                    echo $_SESSION['errors'];
                                    }
?>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="inputDate">Data</label>
                                        <input type="date" class="form-control is-valid" id="inputDate"name="date">
                                        <div class="valid-feedback">
                                            Parece bom!
                                        </div>    
                                </div>

                                <div class="form-group col-md-6">

                                    <label for="inputCategory">Categoria</label>
                                        <select id="inputCategory" class="form-control is-invalid" name="category">
                                            <option selected>Escolha...</option>
<?php
                                            foreach ($categories as $category) {
?>
                                                <option value="<?php echo $category['id']; ?>">
                                                    <?php echo $category['category'];?>
                                                </option>
<?php
                                            }
?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor escolha uma categoria.
                                        </div>
                                </div>

                            </div>

                            <div class="form-group">
                                
                                <label for="inputDescription">Descrição</label>
                                    <input type="text" class="form-control" id="inputDescription" 
                                        placeholder="Ex:.compras do mês" name="description">

                            </div>

                            <div class="form-row">
                        
                                <!-- <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                        <input type="text" class="form-control" id="inputCity">
                                </div> -->

                                <div class="form-group col-md-6">
                                    <label for="inputValue">Valor da Compra</label>
                                        <input type="number" class="form-control" id="inputValue" 
                                            name="value" step="0.01">
                                </div>

<?php 
                            if ($visible) {
?>
                                <div class="form-group col-md-6">
                                    <label for="inputPayMethod">Forma de Pagamento</label>
                                        <select id="inputPayMethod" class="form-control" name="payMethod">
                                            <option selected>Escolha...</option>
<?php
                                            foreach ($payMethods as $payMethod) {
?>
                                                <option value="<?php echo $payMethod['id']; ?>">
                                                    <?php echo $payMethod['pay_method'];?>
                                                </option>
<?php
                                            }
?>                                            
                                        </select>
                                </div>
<?php
                            }
?>
                                <!-- <div class="form-group col-md-4">
                                    <label for="inputState">State</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                        </select>
                                </div>
                        
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Zip</label>
                                        <input type="text" class="form-control" id="inputZip">
                                </div> -->

                            </div>

                            <!-- <div class="form-group">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Check me out
                                        </label>
                                </div>

                            </div> -->

                            <button type="submit" class="btn btn-success" name="btnSave">Salvar</button>


                        </form>
                    </div>

                </div>

            </div>

            <div class="col-sm-3"></div>

        </div>
    </div>

    <!-- fim conteúdo do site -->


    <!-- fim container -->



