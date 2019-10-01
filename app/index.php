<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <!-- determina a largunra do site -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS do Bootstrap 4.3.1 -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <title>fsys</title>
</head>

<body>
    <!-- inicio container  -->
    <div class='container-fluid'>

        <!-- inicio top menu -->
        <?php require_once '../menu.php';?>
        <!-- fim top menu -->
    </div>
    <!-- <hr> -->

    <!-- inicio  conteudo do site-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="row" style="padding: 10px;">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-success">Entrada</button>
                        <!-- <button type="button" class="btn btn-light">Middle</button> -->
                        <button type="button" class="btn btn-success">Saída</button>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                
            </div>
        </div>
    </div>

    <!-- fim conteúdo do site -->


    <!-- fim container -->
    <!-- <footer>
        <p>&copy; 2019 Fsys - Todos os direitos reservados
            <br>
            Termos de uso e Política de privacidade
        </p>
    </footer> -->

    <!-- Arquivo do JQuery -->
    <script type='text/javascript' src="../assets/js/jquery-3.3.1.min.js"></script>
    <!-- Arquivo do bootstrap 4.3.1-->
    <script type='text/javascript' src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>