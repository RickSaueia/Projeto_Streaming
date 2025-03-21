<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="loginn.css">
</head>

<body>
    <div id="loadingScreen" class="loading-screen">
        <div class="loader"></div>
    </div>


    <div id="content" style="display: none;">
        <nav class="nav-box">
            <div class="logo">
                <a href="../index.php" class="logo_h1">LNA</a>
                <a href="../index.php" class="logo2_h1">STREAM</a>
            </div>
        </nav>

        <h1 class="login-txt">Faça login para asssistir aos conteúdos.</h1>

        <main class="container">
            <div class="login-container">
                <?php
                    session_start();
                    if (isset($_SESSION['erro_usuario'])) {
                        echo '<p class="texto-erro">' . $_SESSION['erro_usuario'] . '</p>';
                        echo "<style>.texto-erro{
                                position:absolute;
                                right:850px;
                                font-weight:bold;
                                color:rgb(255, 52, 52);
                            }
                                .login-container input{
    border-bottom:2.5px solid rgb(255, 52, 52);
}

.login-container input:focus ~ .label-input-email,
.login-container input:valid ~ .label-input-email{
    top:345px;
    font-size:12px;
    color:rgb(255, 52, 52); 
}

.login-container input:focus ~ .label-input-senha,
.login-container input:valid ~ .label-input-senha{
    top:410px;
    font-size:12px;
    color:rgb(255, 52, 52);
}

.login-container input:valid ~ .label-input-email{
    top:345px;
    font-size:12px;
    color:rgb(255, 52, 52);
}

.label-input-senha{
    position:absolute;
    top:435px;
    left:750px;
    pointer-events:none;
    transition:0.2s;
    color:rgb(255, 52, 52);
    font-size:20px
}

.label-input-email{
    position:absolute;
    top: 368px;
    left:750px;
    pointer-events:none;
    transition:0.2s; 
    color:rgb(255, 52, 52);
    font-size:20px
}
    .login-container input:focus{
    border-bottom:2.5px solid rgb(255, 0, 0);
}
</style>";
unset($_SESSION['erro_usuario']);
                    }
                ?>
                <form autocomplete="off" action="login.php" method="post">
                    <div class="input-geral">
                        <div class="input-box">
                            <input type="text" name="email" id="email" required>
                            <label for="email" class="label-input-email">E-Mail</label>
                        </div>
                        <div class="input-box">
                            <input type="password" name="senha" id="password" required>
                            <label for="password" class="label-input-senha">Senha</label>
                        </div>
                        <button class="btn-login" type="submit">LOGIN</button>
                        <p class="criar-conta-text">Não possui uma conta? <a href="../cadastro/pg_cadastro.php" class="a">Crie uma</a></p>
                    </div>
                </form>


            </div>
        </main>
    </div>


    <<script src="login.js">
        </script>
</body>

</html>