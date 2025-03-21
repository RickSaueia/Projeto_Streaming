<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
    <link rel="stylesheet" href="pagamentoo.css">
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
                <a href="../index.php" class="logo2_h1">STREAM<a>
            </div>
        </nav>

        <h1 class="cadastro-txt">Se torne premium.</h1>

        <main class="container">
            <div class="login-container">
                <form action="pagamento.php" method="post">
                    <div class="input-geral">
                        <div class="input-box">
                            <input type="text" name="nome_cartão" id="nome" required>
                            <label for="nome" class="label-input-nome">Nome do titular</label>
                        </div>

                        <div class="input-box">
                            <input type="text" name="numero_cartão" id="numero" required
                                oninput="formatarnumero_cartao(event)" maxlength="19">
                            <label for="senha" class="label-input-numero">Número do cartão</label>
                        </div>

                        <div class="validade-cvc-container">
                            <div class="input-box">
                                <input type="text" name="validade" id="validade" autocomplete="off" required
                                    oninput="formatarValidade(event)" maxlength="5">
                                <label for="validade" class="label-input-validade">Validade</label>
                            </div>

                            <div class="input-box">
                                <input type="text" name="cvc" id="cvc" autocomplete="off" required maxlength="3"
                                    oninput="permitirApenasNumerosInteiros(event)">
                                <label for="cvc" class="label-input-cvc">CVC</label>
                            </div>
                        </div>
                        <button class="btn-login" type="submit" value="cadastrar cartao">CONCLUIR</button>
                    </div>

                    <select name="forma_pagamento" id="forma_pagamento">
                        <option value="Débito">Débito</option>
                        <option value="Crédito">Crédito</option>
                    </select>


                </form>


            </div>
        </main>
    </div>


    <script src="pagamento.js"></script>
</body>

</html>