<div class='row justify-content-between menu-box'>
    <!-- botões do site -->
    <div class='col-md-8'>
        <div class="row justify-content-start">
            <div class="col">
                <a href="<?php echo $dir; ?>index.php" class='btn btn-light'>Home<img src="" alt=""></a>
                <a href="<?php echo $dir; ?>launched.php" class='btn btn-light'>Lançados<img src="" alt=""></a>
            </div>
        </div>
    </div>
    <!-- fim botões do site -->

    <!-- inicio formulário de login -->
    <div class='col-sm-3'>
        <div class="row justify-content-end">
                
            <div class="btn-group">
                
                <button type="button" class="btn btn-light dropdown-toggle" 
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opções
                </button>
                
                <div class="dropdown-menu dropdown-menu-right">
                
                    <!-- <a href="#" class="dropdown-item">Formas de pagamento</a> -->
                    <a href="<?php echo $dir; ?>options/category.php" class="dropdown-item">Categorias</a>
                    
                    <div class="dropdown-divider"></div>
                    
                    <a href="<?php echo $dir; ?>logout.php" class="dropdown-item"><strong>Sair</strong></a>
                
                </div>
            </div>

        </div>
        
    </div>
    <!-- fim forulário de login -->

</div>