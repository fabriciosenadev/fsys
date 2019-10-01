<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <!-- determina a largunra do site -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS do Bootstrap 4.3.1 -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <title>fsys</title>
</head>

<body>
    <!-- inicio container  -->
    <div class='container-fluid'>

        <!-- inicio top menu -->
        <?php require_once 'menu.php';?>
        <!-- fim top menu -->
    </div>
    <!-- <hr> -->

    <!-- inicio  conteudo do site-->
    <div class="container-fluid">
        <div class="invide">
            <h2>Gerencie suas finanças <br>de forma simples.</h2>
            <h5>Cadastre-se, é facil e gratuito.</h5>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Digite seu e-mail."
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="button" id="button-addon2">Cadastre-se grátis</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid  container-cards">
        <div class="cards">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Controle de gastos</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Nossa plataforma é intuitiva e fácil de ser usada para
                        você acompanhar suas transações.</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Saiba como seu dinheiro está sendo utilizado</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Chega de se perder com anotações no papel com fsys
                        você
                        analisa seus dados com relatórios e gráficos</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Acesse de onde estiver</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Sempre que precisar acompanhe suas finanças, até mesmo
                        offline</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Controle de gastos</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Nossa plataforma é intuitiva e fácil de ser usada para
                        você acompanhar suas transações.</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Saiba como seu dinheiro está sendo utilizado</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Chega de se perder com anotações no papel com fsys
                        você
                        analisa seus dados com relatórios e gráficos</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Acesse de onde estiver</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Sempre que precisar acompanhe suas finanças, até mesmo
                        offline</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- fim conteúdo do site -->


    <!-- fim container -->
    <footer>
        <p>&copy; 2019 Fsys - Todos os direitos reservados
            <br>
            Termos de uso e Política de privacidade
        </p>
    </footer>

    <!-- Arquivo do JQuery -->
    <script type='text/javascript' src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- Arquivo do bootstrap 4.3.1-->
    <script type='text/javascript' src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>