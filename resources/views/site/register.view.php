<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/register.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Cadastro</title>
</head>

<body>
    <form>
        <h1>Fsys</h1>

        <fieldset class="login">
            
            <p class="name">Nome</p>
            <input id="name" name="name" type="text" required />

            <!-- campo de e-mail -->
            <p class="email">E-mail</p>
            <input id="email" name="email" placeholder="seu@email.com" type="email" required />

            <!-- campo de senha -->
            <p class="password">Senha</p>
            <input id="password" name="password" placeholder="********" type="password" required>
            
            <!-- campo de repetir senha -->
            <p class="password">Repetir Senha</p>
            <input id="password" name="password" placeholder="********" type="password" required>

            <button class="btn btn-success" type="submit" id="btn-login" name="btnLogin" value="Entrar">
                Cadastrar
            </button>

        </fieldset>
    </form>
    <footer>
        © 2019 Fsys - Todos os direitos reservados<br><a href="register.view.html"></a>
        Termos de uso e Política de privacidade
    </footer>
</body>

</html>