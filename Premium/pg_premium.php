<?php
include "session.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Streaming</title>
    <link rel="stylesheet" href="style-premium.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <!-- Tela de carregamento -->
    <div id="loadingScreen" class="loading-screen">
        <div class="loader"></div>
    </div>

    <!-- Conteúdo da sua página -->
    <div id="content" style="display:none;">
        <div class="overlay2" id="overlay2"></div>
        <div class="overlay3" id="overlay3"></div>

        <nav class="nav-box">

            <div class="logo">
                <a href="../index.php" class="logo_h1">LNA</a>
                <a href="../index.php" class="logo2_h1">STREAM</a>
            </div>

            <div class="navegar" id="navegar">
                <p>Navegar</p>
                <i class="fa-solid fa-sort-down setaBaixo"></i>
                <div class="generos_nav">
                    <p>Gêneros</p>
                    <div class="generos_nav_links">
                        <a href="../filmes_generos/pg_filme_ação/pg_ação.php">Ação</a>
                        <a href="../filmes_generos/pg_filme_comedia/pg_comedia.php">Comédia</a>
                        <a href="../filmes_generos/pg_filme_romance/pg_romance.php">Romance</a>
                        <a href="../filmes_generos/pg_filme_suspense/pg_suspense.php">Suspense</a>
                        <a href="../filmes_generos/pg_filme_aventura/pg_aventura.php">Aventura</a>
                        <a href="../filmes_generos/pg_filme_drama/pg_drama.php">Drama</a>
                        <a href="../filmes_generos/pg_filme_fantasia/pg_fantasia.php">Fantasia</a>
                    </div>


                </div>

            </div>

            <div class="usuario">
                <a href=""></a>
                <i class="fa-regular fa-user fa-2xl user"></i>

            </div>
            <?php
            if ($email != "") {
                if ($plano_assinatura == "Premium") {
                    echo "<div class='perfil-nav'>
            <div class='perfil-nav-link'>
                <div class='perfil-nav-link-item'>
                    <a href='#' class='link-user-principal'>$nome<i class='fa-solid fa-star estrela-premium'></i></a>
                    <a href='#' class='texto-menor'>Seja bem vindo.</a>
                </div>
                <div class='perfil-nav-link-item'>
                    <a href='#' class='link-user-principal'>Premium</a>
                    <a href='#' class='texto-menor'>Torne-se Premium.</a>
                </div>
                <div class='perfil-nav-link-item'>
                    <a href='logout.php' class='link-user-principal'>Sair</a>
                    <a href='logout.php' class='texto-menor'>Volte sempre!</a>
                </div>
            </div>
        </div>";
                }
                if ($plano_assinatura == "gratuito") {
                    echo "<div class='perfil-nav'>
            <div class='perfil-nav-link'>
                <div class='perfil-nav-link-item'>
                    <a href='#' class='link-user-principal'>$nome</a>
                    <a href='#' class='texto-menor'>Seja bem vindo.</a>
                </div>
                <div class='perfil-nav-link-item'>
                    <a href='pagamento/pg_pagamento.php' class='link-user-principal'>Premium</a>
                    <a href='pagamento/pg_pagamento.php' class='texto-menor'>Torne-se Premium.</a>
                </div>
                <div class='perfil-nav-link-item'>
                    <a href='logout.php' class='link-user-principal'>Sair</a>
                    <a href='logout.php' class='texto-menor'>Volte sempre!</a>
                </div>
            </div>
        </div>";
                }
            } else {
                echo "<div class='perfil-nav'>
            <div class='perfil-nav-link'>
                <div class='perfil-nav-link-item'>
                    <a href='cadastro/pg_cadastro.php' class='link-user-principal'>Criar Conta</a>
                    <a href='cadastro/pg_cadastro.php' class='texto-menor'>Cadastre-se agora.</a>
                </div>
                <div class='perfil-nav-link-item'>
                    <a href='login/pg_login.php' class='link-user-principal'>Login</a>
                    <a href='login/pg_login.php' class='texto-menor'>Seja bem-vindo, Faça Login agora</a>
 
                </div>
                <div class='perfil-nav-link-item'>
                    <a href='login/pg_login.php' class='link-user-principal'>Premium</a>
                    <a href='login/pg_login.php' class='texto-menor'>Torne-se premium.</a>
                </div>
            </div>
        </div>";
            }
            ?>





        </nav>

        <?php
        if ($email != "") {
            echo "<div class='container'>";

            include "connection.php";
            include "filme-logado.php";
            $generos = ["Desenho"];

            foreach ($generos as $genero) {
                seletor($genero, $conn);
            }




            echo "</div>";
        } else {
            echo "<div class='container'>";

            include "connection.php";
            include "filme-não-logado.php";
            $generos = ["Desenho"];

            foreach ($generos as $genero) {
                seletor($genero, $conn);
            }




            echo "</div>";
        }
        ?>






        <!-- filmes -->
        <!-- <div class="container">
        <div class="filme-container">
            <h1 class="genero-txt2">AÇÃO</h1>
            <div class="wrapper">
                <div class="lista-filme">
                    <div class="filme-item">
                        <img src="img/Death1080xnote.jpg" alt="" class="filme-item-img">
                        <span class="filme-item-titulo">Death Note</span>
                        <p class="filme-item-descricao">Dub | Leg</p>
                        <div class="overlay">
                            <span class="overlay-item-titulo">Death Note</span>
                            <p class="overlay-item-linguagem">Dub | Leg</p>
                            <p class="overlay-item-descricao">Death Note é um anime e mangá de suspense sobre Light Yagami,
                                um estudante que encontra um caderno
                                capaz de matar qualquer pessoa.
                            </p>

                            <a href="death-note.php" class="death-note-link"></a>
                            <a href="death-note.php" class="death-note-link2"><i class="fa-solid fa-play botao-play"></i></a>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div> -->






        <!-- <div class="container">
        <div class="conteudo">
            <div class="emalta">
                <img src="img/Dragon ball titulo.png" alt="" class="emalta-titulo">
            </div>
        </div>
    </div> -->
    </div>





    <<script src="script.js">
        </script>
</body>

</html>