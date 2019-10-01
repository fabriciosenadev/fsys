<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!-- determina a largunra do site -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS do Bootstrap 4.3.1 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">    
    <title>fsys</title>
</head>
<body>
    <!-- inicio container  -->
    <div class='container-fluid'>
       
        <!-- inicio top menu -->
        <div class='row justify-content-between' style="padding: 15px 10px 0px 10px;">
            <!-- botões do site -->
            <div>
                <!-- <h3>Painel de Login</h3> -->
                <img src="" alt="">
                <a href="#" class='btn btn-success'>Home</a>
                <a href="#" class='btn btn-success'>Sobre</a>
                <a href="#" class='btn btn-success'>Cadastro</a>
            </div>
            <!-- fim botões do site -->

            <div>
                <!-- <a href="#" class='btn btn-success'>Login</a> -->
            </div>

            <!-- inicio formulário de login -->
            <div>
                <form method="POST" action="">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Senha">
                        </div>
                        <div class="col">
                            <input type="submit" class="form-control btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
            <!-- fim forulário de login -->

        </div>
        <!-- fim top menu -->
        
        <hr>

        <!-- inicio  conteudo do site-->
        <div class="container">
        
            <div class="row">
                
                <div class="col">
                    <div class="card">
                        <h5 class="card-header bgreen">O que é o fsys</h5>
                        <div class="card-body">
                        <!-- <h5 class="card-title">Special title treatment</h5> -->
                            <p class="card-text">
                                Este sistema foi pensado e desenvolvido para:
                                <!-- <br> -->
                                ajudar a gerenciar, administrar e investir seu dinheiro. Isso poderá te ajudar a direcionar e trabalhar seu dinheiro.
                                <!-- <ul>
                                <li>viagens</li>
                                <li>despesas inespeperadas</li>
                                <li>investimento</li>
                                <li>e muitas outras finalidades...</li>
                                </ul> -->
                            </p>
                            <a href="#" class="btn btn-success">Aprender mais</a>
                        </div>
                    </div>
                </div>

                <div class="col">coluna 2</div>

            </div>

        </div>
        <!-- fim conteúdo do site -->
        
    </div>
    <!-- fim container -->

    <!-- Arquivo do JQuery -->
    <script type='text/javascript' src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- Arquivo do bootstrap 4.3.1-->
    <script type='text/javascript' src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>