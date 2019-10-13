<div class='row justify-content-between menu-box'>
    <!-- botões do site -->
    <div class='col-md-7'>
        <!-- <img src="" alt=""> -->
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="about.php">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Cadastro</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li> -->
        </ul>
    </div>
    <!-- fim botões do site -->

    <!-- inicio formulário de login -->
    <div class='col-sm-5'>
        <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
            <div class="form-row">
                <div class="col">
                    <input name="email" type="text" class="form-control" placeholder="E-mail">
                </div>
                <div class="col">
                    <input name="password" type="password" class="form-control" placeholder="Senha">
                </div>
                <div class="col">
                    <input name="btnLogin" type="submit" class="form-control btn btn-light" value="Entrar">
                </div>
            </div>
        </form>
    </div>
    <!-- fim forulário de login -->

</div>