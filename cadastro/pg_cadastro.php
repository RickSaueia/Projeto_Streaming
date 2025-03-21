<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
    <link rel="stylesheet" href="cadastroo.css">
</head>

<body>

    <!-- Tela de Carregamento com o Spinner -->
    <div id="loadingScreen" class="loading-screen">
        <div class="loader"></div>
    </div>


    <div id="content">
        <nav class="nav-box">
            <div class="logo">
                <a href="../index.php" class="logo_h1">LNA</a>
                <a href="../index.php" class="logo2_h1">STREAM</a>
            </div>
        </nav>

        <h1 class="cadastro-txt">Criar Conta</h1>

        <main class="container">
            <div class="login-container">
                <?php

                //depois voce faz
                session_start();
                if (isset($_SESSION['erro_cpf'])){
                    echo '<p class="texto-erro">' . $_SESSION['erro_cpf'] . '</p>';
                    echo "<style>.texto-erro{
                        position:absolute;
                        right:920px;
                        font-weight:bold;
                        color:rgb(255, 52, 52);
                    }
                    
                    .login-container input:focus ~ .label-input-cpf,
.login-container input:valid ~ .label-input-cpf{
    top:560px;
    font-size:12px;
    color:rgb(255, 52, 52);
}

.login-container .input-cpf {
    width: 400px;
    padding: 10px;
    margin: 10px 0;
    font-size: 14px;
    background:none;
    border:none;
    outline:none;
    color:rgb(255, 255, 255);
    border-bottom:2.5px solid rgb(255, 52, 52);
    transition:0.1s ease-in-out;
    font-size:17px;
    background-color: transparent !important;
    
}

.login-container .input-cpf:focus{
    border-bottom:2.5px solid rgb(255, 52, 52);
}

.label-input-cpf{
    color:rgb(255, 52, 52);
}
</style>";
                    unset($_SESSION['erro_cpf']); // Remove o erro após exibir
                }


                
                if (isset($_SESSION['erro_email'])) {
                    echo '<p class="texto-erro">' . $_SESSION['erro_email'] . '</p>';
                    echo "<style>.texto-erro{
    position:absolute;
    right:880px;
    font-weight:bold;
    color:rgb(255, 52, 52);
}

.label-input-email{
    color:rgb(255, 52, 52);
}


.login-container input:focus ~ .label-input-email,
.login-container input:valid ~ .label-input-email{
    top:370px;
    font-size:12px;
    color:rgb(255, 52, 52);
}

.login-container .input-email{
    border-bottom:2.5px solid rgb(255, 52, 52);
}
.login-container .input-email:focus{
    border-bottom:2.5px solid rgb(255, 52, 52);
}</style>";
                    unset($_SESSION['erro_email']); // Remove o erro após exibir
                }
                if (isset($_SESSION['erro_senha'])) {
                    echo '<p class="texto-erro">' . $_SESSION['erro_senha'] . '</p>';
                    
                    echo "<style>.texto-erro{
    position:absolute;
    right:880px;
    font-weight:bold;
    color:rgb(255, 52, 52);
}

.label-input-senha{
    color:rgb(255, 52, 52);
}
.label-input-confirmar-senha{
    color:rgb(255, 52, 52);
}

.login-container input:focus ~ .label-input-senha,
.login-container input:valid ~ .label-input-senha{
    top:430px;
    font-size:12px;
    color:rgb(255, 52, 52);
}

.login-container input:focus ~ .label-input-confirmar-senha,
.login-container input:valid ~ .label-input-confirmar-senha{
    top:500px;
    font-size:12px;
    color:rgb(255, 52, 52);
}

.login-container .input-senha{
    border-bottom:2.5px solid rgb(255, 52, 52);
}
.login-container .input-senha:focus{
    border-bottom:2.5px solid rgb(255, 52, 52);
}

.login-container .input-confirmar-senha{
    border-bottom:2.5px solid rgb(255, 52, 52);
}
.login-container .input-confirmar-senha:focus{
    border-bottom:2.5px solid rgb(255, 52, 52);
}</style>";
unset($_SESSION['erro_senha']); // Remove o erro após exibir  
                }
                ?>
                <form action="cadastrar.php" method="post">
                    <div class="input-geral">
                        <div class="input-box">
                            <input type="text" name="nome" id="nome" required maxlength="64">
                            <label for="nome" class="label-input-nome">Nome</label>
                        </div>

                        <div class="input-box">
                            <input class="input-email" type="text" name="email" id="email" autocomplete="off" required>
                            <label for="email" class="label-input-email">E-Mail</label>
                        </div>

                        <div class="input-box">
                            <input class="input-senha" type="password" name="senha" id="senha" autocomplete="off" required>
                            <label for="senha" class="label-input-senha">Senha</label>
                        </div>

                        <div class="input-box">
                            <input class="input-confirmar-senha" type="password" name="confirmar_senha" id="confirmar_senha" required>
                            <label for="senha" class="label-input-confirmar-senha">Confirmar Senha</label>
                        </div>

                        <div class="input-box">
                            <input type="text" name="cpf" id="cpf" maxlength="14" required
                            oninput="formatCPF(this)" class="input-cpf">
                            <label for="cpf" class="label-input-cpf">CPF</label>
                        </div>

                        <button class="btn-login" type="submit">Cadastrar</button>
                        <p class="login-text">Já possui uma conta? <a href="../login/pg_login.php" class="a">Faça login</a></p>
                    </div>
                </form>


            </div>
        </main>
    </div>


    <script src="cadastro.js"></script>
</body>

</html>