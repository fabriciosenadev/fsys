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
                            if ($_SESSION['errors']) {
?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Opa!</strong> <?php echo $_SESSION['errors']; ?>
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
                                    <label for="inputEmail">E-mail</label>
                                        <input type="email" id="inputEmail"name="email"
                                            class="form-control" placeholder="seu@email.com" required>
                                        <div class="valid-feedback">
                                            Parece bom!
                                        </div>  
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="form-group col-md">
                                    <label for="inputPassword">Senha</label>
                                        <input type="password" id="inputPassword" name="password"
                                            class="form-control" placeholder="********" required> 
                                </div>

                            </div>

                            <div class="form-row">
                              <!-- <div class="form-group col-md">

                                </div> -->
                                <!-- <a href="#" class="forgot-password">esqueceu sua senha?</a> -->
                            </div>
                            <button type="submit" class="btn btn-success form-control" name="btnLogin" value="Entrar">
                              Entrar
                            </button>

                            <div class="form-row">
                            
                              <div class="form-group col-md">

                                <a href="forgot.php" class="forgot-password">esqueceu sua senha?</a>
                              </div>
                                
                            </div>

                            </form>
                        </div>

                    </div>

                </div>


                <div class="row justify-content-center" style="margin-top:10px;">
                        

                      <div class="border border-success rounded-bottom" 
                        style="width:400px;padding: 10px; background-color:white;">

                        <div class="col" style="margin:15px 0;">


                        <p>Novo por aqui? <a href="register.php">Cadastre-se é gratuito!</a></p>


                        </div>

                    </div>

                </div>

            </div>

            <div class="col-sm-2"></div>

        </div>
        
    </div>
    <!-- fim conteúdo do site -->
        

    <!-- fim container -->










<!-- <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
  <a href="index.php" style="color:black">
      <h1>Fsys</h1>
  </a>
  
  <fieldset class="login"> -->
    <!-- campo de e-mail -->
    <!-- <p class="email">E-mail</p>
      <input id="email" name="email" placeholder="seu@email.com" type="email" required/> -->

    <!-- campo de seha -->
    <!-- <p class="password">Senha</p> 
    <a href="#" class="forgot-password">esqueceu sua senha?</a>
      <input id="password" name="password" placeholder="********" type="password" required> -->

    <!-- exibição de erros -->
    <!-- <div class="error"> -->
      <?php 
        // if ($_SESSION['errors']) {
        //     echo $_SESSION['errors'];
        //   }
      ?>
    <!-- </div>

    <button class="btn btn-success" type="submit" id="btn-login" name="btnLogin" value="Entrar">
      Entrar
    </button>

  </fieldset>

  <div class="registry">       
    <p>Novo por aqui? <a href="register.php">Cadastre-se é gratuito!</a></p>
  </div>

</form> -->


