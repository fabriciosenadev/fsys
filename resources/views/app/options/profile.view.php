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

                        <form method="post" action="<?php $_SERVER['PHP_SELF']?>">

                            <div class="form-row">

                                <div class="form-group col-md">
                                    <h2>Meus dados</h2>
                                </div>

                            </div>


                            <div class="form-row">

                                <div class="form-group col-md-4">

                                    <label>Nome</label>

                                </div>

                                <div class="form-group col-md-8">

                                    <label><?php echo $name;?></label>

                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-4">

                                    <label>E-mail</label>

                                </div>

                                <div class="form-group col-md-8">

                                    <label><?php echo $email;?></label>

                                </div>

                            </div>
                            
                            <hr>
                            <p><strong>Alteração de senha</strong></p>

                            <div class="form-row">

                                <div class="form-group col-md-4">

                                    <label>Nova Senha (minimo 8 caracteres)</label>

                                </div>

                                <div class="form-group col-md-8">

                                    <input type="password" name="password" value="<?php echo $password;?>"
                                    class="form-control <?php echo $stylePassword;?>" require>
                                    <div class="valid-feedback">
                                        Parece bom!
                                    </div>  
                                    <div class="invalid-feedback">
<?php                                       
                                        echo ($errors['password']) 
                                            ?   $errors['password']
                                            :   null;
?>
                                    </div> 

                                </div>

                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-4">

                                    <label>Repetir Nova Senha</label>

                                </div>

                                <div class="form-group col-md-8">

                                    <input type="password" name="verify" value="<?php echo $verify;?>"
                                    class="form-control <?php echo $styleVerify;?>" require>
                                    <div class="valid-feedback">
                                        Parece bom!
                                    </div>  
                                    <div class="invalid-feedback">
<?php                                       
                                    echo ($errors['verify']) 
                                        ?   $errors['verify']
                                        :   null;
?>
                                    </div> 

                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-2">
                                    <!-- <button type="submit" class="btn btn-success" name="btnAlter">Alterar</button>     -->
                                    <input type="submit" class="btn btn-success" name="btnAlter" value="Alterar">
                                </div>

                            </div>

                        </form>

                        <div>
<?php
                        if($msg){
?>
                            <div class="form-group col-md">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Sucesso!</strong> <?php echo $msg; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
<?php
                        }
?>                        
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-sm-2"></div>

        </div>
    </div>

    <!-- fim conteúdo do site -->


    <!-- fim container -->