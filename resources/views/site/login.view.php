  
    <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
      <h1>Fsys</h1>
      <fieldset class="login">
        <p class="email">E-mail</p>
        <input id="email" name="login" placeholder="seu@email.com" type="email" required/>
        <p class="password">Senha</p> <a href="#" class="forgot-password">esqueceu sua senha?</a>
        <input id="password" name="password" placeholder="********" type="password" required>
        <div class="error">
          <?php 
          if($_SESSION['errors'])
          {
            echo $_SESSION['errors'];
          }
          ?>
        </div>
        <button class="btn btn-success" type="submit" id="btn-login" name="btnLogin">Entrar</button>
      </fieldset>
      <div class="registry">       
        <p>Novo por aqui? <a href="#">Cadastre-se é gratuito!</a></p>
      </div>
    </form>


