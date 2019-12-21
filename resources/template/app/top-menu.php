<?php
  require_once $dir.'../app/models/app/options/user.model.php';
  $idUser = $_SESSION['id_user'];

  $userData = selectUser($idUser);

  // var_dump($userData);

  extract($userData);
?>
<nav class="navbar navbar-expand-lg navbar-light menu-box">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
        <a class='btn btn-success' href="<?php echo $dir; ?>index.php" >Home <i class="fas fa-home"></i> <img src="" alt=""></a>
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link" href="#">Link</a> -->
        <a class='btn btn-success' href="<?php echo $dir; ?>launched.php">Lançamentos</a>
      </li>
    </ul>

    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->

    <ul class="navbar-nav my-2">
      <li class="nav-item dropdown my-2 my-sm-0">
        <a class="btn btn-success dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $name; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a href="<?php echo $dir; ?>options/profile.php" class="dropdown-item">Perfil</a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo $dir; ?>options/category.php" class="dropdown-item">Categorias</a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo $dir; ?>logout.php" class="dropdown-item"><strong>Sair</strong></a>
        </div>
      </li>
    </ul>

  </div>
</nav>