<?php
    require_once "../db/connect.php";

    session_start();    
    $btn_cadastrar = isset($_POST['btnCadastrar']) ? $_POST['btnCadastrar'] : null;
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $login = isset($_POST['email']) ? $_POST['email'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
    $rpt_senha = isset($_POST['rptsenha']) ? $_POST['rptsenha'] : null;
    $sucesso = $erros = $class = [];
    $class_nome = $class_email = $class_senha = $class_rpt_senha = '';

    if($btn_cadastrar){
        if($nome == ''){
            $erros[] = 'O campo Nome deve ser preenchido';            
            $class_nome = 'text-danger';
        }        
        if($login == ''){
            $erros[] = 'O campo E-mail deve ser preenchido';
            $class_email = 'text-danger';
        }
        if($senha == ''){
            $erros[] = 'O campo Senha deve ser preenchido';
            $class_senha = 'text-danger';
        }
        if($rpt_senha == ''){
            $erros[] = 'O campo Repetir Senha deve ser preenchido';
            $class_rpt_senha = 'text-danger';
        }
        if(!($senha == $rpt_senha)){
            $erros[] = 'As senhas devem ser iguais';
            $class_senha = $class_rpt_senha = 'text-danger';
        }
        if(!(filter_var($login, FILTER_VALIDATE_EMAIL))){
            $erros[] = 'Informe um e-mail válido';
            $class_email = 'text-danger';
        }
        if(strlen($nome) <= 5){
            $erros[] = 'Informe seu nome completo';
            $class_nome = 'text-danger';
        }        
        
        if(!$erros){
            $verificar = "SELECT id FROM usuarios WHERE login = '$login'";
            $resultado = mysqli_query($conexao, $verificar);

            if(mysqli_num_rows($resultado) > 0){
                $erros[] = 'E-mail já cadastrado';
                $erros[] = 'text-danger';
            }
            if(mysqli_num_rows($resultado) == 0){
                
                $salvar = "INSERT INTO usuarios(login, senha, nome) 
                            VALUES('$login', '$senha', '$nome')";
                if(mysqli_query($conexao, $salvar)){
                    $sucesso = 'Cadastro realizado com sucesso';
                    $rpt_senha = $senha = $login = $nome = '';                    
                }            
            }
        }

    }    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!-- determina a largunra do site -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS do Bootstrap 4.3.1 -->
    <link rel="stylesheet" href="../resources/assets/css/bootstrap.min.css">    
    <title>sistema de visitas</title>
</head>
<body>

    <div class='container col-sm-6'>
        <br>
        <div class='row justify-content-between'>
            <div>
                <h3>Novo Usuario</h3>        
            </div>
            <div>
                <a href="../" class='btn btn-primary align--right'>Voltar</a>    
            </div>
        </div>
        <?php
            if($btn_cadastrar and $erros){                
                foreach($erros as $erro){                    
                    echo "<li class='text-danger'>".$erro."</li>";
                }
            }
            if($sucesso){
                echo "<p class='text-success'>".$sucesso."</p>"; 
                sleep(3);
                header("Location: ../");
            }
        ?>
        <hr> 
        <div class='col-sm'>
            <form method='post' action='<?php $_SERVER['PHP_SELF'];?>'>
                <div class="form-group row">
                    <label for="inputNome" class="col-sm-3 col-form-label <?php echo $class_nome;?>">
                        Nome
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputNome" name='nome' value='<?php echo $nome;?>'>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputLogin" class="col-sm-3 col-form-label <?php echo $class_email;?>">
                        E-mail
                    </label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="inputLogin" name='email' value='<?php echo $login;?>'>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputSenha" class="col-sm-3 col-form-label  <?php echo $class_senha;?>">
                        Senha
                    </label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="inputSenha" name='senha' value='<?php echo $senha;?>'>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputRptSenha" class="col-sm-3 col-form-label  <?php echo $class_rpt_senha;?>">
                        Repetir Senha
                    </label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="inputRptSenha" name='rptsenha' value='<?php echo $rpt_senha;?>'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"name='btnCadastrar' value='Cadastrar'>
                            Cadastrar
                        </button>
                    </div>
                </div>
            </form>        
        </div>        
    </div>    
    <!-- Arquivo do JQuery -->
    <script type='text/javascript' src="../assets/js/jquery-3.3.1.min.js"></script>
    <!-- Arquivo do bootstrap 4.3.1-->
    <script type='text/javascript' src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>