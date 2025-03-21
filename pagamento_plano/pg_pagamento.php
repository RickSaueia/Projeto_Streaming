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

        <h1 class="cadastro-txt">Selecione seu premium.</h1>

        <main class="container">
            <div class="premium-box">
                <div class="premium-head">
                    <h1 class="titulo-premium"><strong>LNA </strong>PREMIUM</h1>
                    <h1 class="preço-premium">R$30,00</h1>
                </div>
                <a class="botao-premium" href="../pagamento/pg_pagamento.php">TORNAR-SE PREMIUM</a>
                <p class="premium-text">Assista a conteúdos exclusivos presentes na galeria LNA STREAM!</p>
            </div>
        </main>
    </div>


    <script src="pagamento.js"></script>
</body>

</html>