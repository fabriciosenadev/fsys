    <!-- <footer>
        <p>&copy; 2019 Fsys - Todos os direitos reservados
            <br>
            Termos de uso e Política de privacidade
        </p>
    </footer> -->
    <?php
            $folders = explode("/", $_SERVER['REQUEST_URI']);
            $i = array_search('fsys',$folders);
            do{
                $i--;
                unset($folders[$i]);
            } while ( $i > 0);

            $count = count($folders);

            $go_back = 0;
            $dir = '';
            // check the current folder
            while($count > 2){
                $count--;
                $folders[$count];
                $go_back++;
            }
            //if the current folder will greates than 5 return one level
            while($go_back > 0){
                $dir = "../".$dir;
                $go_back--;
            }

            // require_once 'top-menu.php';
        ?>
    <!-- CSS do Bootstrap 4.3.1 -->
    <link rel="stylesheet" href="<?php echo $dir; ?>resources/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $dir; ?>resources/assets/css/app/home.css">

    <!-- Arquivo do JQuery -->
    <script type='text/javascript' src="<?php echo $dir; ?>resources/assets/js/jquery-3.3.1.min.js"></script>
    <!-- Arquivo do bootstrap 4.3.1-->
    <script type='text/javascript' src="<?php echo $dir; ?>resources/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>