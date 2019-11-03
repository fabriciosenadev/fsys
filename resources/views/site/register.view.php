    <!-- inicio  conteudo do site-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm">
                <!-- <?php include '../../resources/template/app/side-menu.php';?> -->
            </div>

            <div class="col-md-8" id="main">
            
                <div class="row justify-content-center">
                <a href="index.php" style="color:black;">

                    <h1>Fsys</h1>            
                </a>    
                </div>

                <div class="row justify-content-center" style="margin-top:10px;">
                        

                        <div class="border border-success rounded-bottom" 
                        style="width:400px;padding: 10px; background-color:white;">

                        <div class="col" style="margin:15px 0;">

                        <div>                                
<?php
                            if ($msg) {
?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Sucesso!</strong> <?php echo $msg; ?> 
                                    Cliquei <a href="login.php">aqui</a>  
                                    para fazer login.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
<?php
                                    
                            }
?>
                        </div>


                            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">

                            <div class="form-row">

                                <div class="form-group col-md">
                                    <label for="inputName">Nome completo</label>
                                        <input type="text" id="inputName"name="name" value="<?php echo $name;?>"
                                            class="form-control <?php echo $styleName;?>" require>
                                        <div class="valid-feedback">
                                            Parece bom!
                                        </div>  
                                        <div class="invalid-feedback">
<?php                                       
                                            echo ($errors['name']) 
                                                ?   $errors['name']
                                                :   null;
?>
                                        </div>  
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="form-group col-md">
                                    <label for="inputEmail">E-mail</label>
                                        <input type="e-mail" id="inputEmail"name="email" value="<?php echo $email;?>"
                                            class="form-control <?php echo $styleEmail;?>" require>
                                        <div class="valid-feedback">
                                            Parece bom!
                                        </div>  
                                        <div class="invalid-feedback">
<?php                                       
                                            echo ($errors['email']) 
                                                ?   $errors['email']
                                                :   null;
?>
                                        </div>  
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="form-group col-md">
                                    <label for="inputPassword">Senha (minimo 8 caracteres)</label>
                                        <input type="password" id="inputPassword"name="password" value="<?php //echo $category;?>"
                                            class="form-control <?php //echo $stylePassword;?>" require>
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

                                <div class="form-group col-md">
                                    <label for="inputVerify">Repita a senha</label>
                                        <input type="password" id="inputVerify"name="verify" value="<?php //echo $category;?>"
                                            class="form-control <?php //echo $styleVerify;?>" require>
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

                            <button type="submit" class="btn btn-success form-control" name="btnRegister" value="register">
                                Cadastrar
                            </button>

                            </form>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-sm-2"></div>

        </div>
        
    </div>
    <!-- fim conteúdo do site -->
        

    <!-- fim container -->



