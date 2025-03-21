<?php
function seletor($genero, $sqlconn)
{
    // Busca os filmes do gênero informado
    $query = $sqlconn->prepare("SELECT * FROM conteudos WHERE genero = ?");
    $query->execute([$genero]);
    $reg = $query->fetchAll(PDO::FETCH_ASSOC);

    echo "<div class='filme-container'>
            <h1 class='genero-txt2'>$genero</h1>
            <div class='wrapper'>
                <button class='prev'><i class='fa-solid fa-chevron-left'></i></button>
                <div class='lista-filme'>";

    foreach ($reg as $filme) {
        // Obtém a quantidade de likes do filme
        $query_likes = $sqlconn->prepare("SELECT COUNT(*) as total_likes FROM interacoes WHERE id_conteudo = ? AND avaliacoes = 'Like'");
        $query_likes->execute([$filme['id_conteudo']]);
        $like_count = $query_likes->fetch(PDO::FETCH_ASSOC)['total_likes'];
        
        // Obtém a quantidade de deslikes do filme
        $query_deslikes = $sqlconn->prepare("SELECT COUNT(*) as total_deslikes FROM interacoes WHERE id_conteudo = ? AND avaliacoes = 'Deslike'");
        $query_deslikes->execute([$filme['id_conteudo']]);
        $deslike_count = $query_deslikes->fetch(PDO::FETCH_ASSOC)['total_deslikes'];

        // Exibe os itens do filme
        echo "<div class='filme-item'>";
        echo "<img src='img/" . $filme['img_url'] . "' alt='' class='filme-item-img'>";
        echo "<span class='filme-item-titulo'>" . $filme['titulo'] . "</span>";
        echo "<p class='filme-item-descricao'>Dub | Leg</p>";
        echo "<div class='overlay'>";
        echo "<span class='overlay-item-titulo'>" . $filme['titulo'] . "</span>";
        echo "<p class='overlay-item-linguagem'>Dub | Leg</p>";
        echo "<p class='overlay-item-descricao'>" . $filme['descricao'] . "</p>";
        echo "<a href='pg_filmes/" . $filme['titulo'] . "/" . $filme['titulo'] . ".php' class='link-principal'></a>";
        echo "<a href='pg_filmes/" . $filme['titulo'] . "/" . $filme['titulo'] . ".php' class='link-botao'><i class='fa-solid fa-play botao-play'>
                <div class='play-hover-info'>Reproduzir</div></i></a>";
        echo "<a href='like-deslike.php?id_conteudo=" . $filme['id_conteudo'] . "' class='fa-solid fa-thumbs-up botao-like'>
                <div class='like-hover-info'>Marcar como gostei</div></a>";
        echo "<a href='deslike.php?id_conteudo=" . $filme['id_conteudo'] . "' class='fa-solid fa-thumbs-down botao-deslike'>
                <div class='deslike-hover-info'>Marcar como não gostei</div></a>";
        
        // Exibe o contador de likes
        echo "<p class='contador-like'>" . $like_count . "</p>";

        // Exibe o contador de deslikes
        echo "<p class='contador-deslike'>" . $deslike_count . "</p>";

        echo "</div>"; 
        echo "</div>"; 
    }

    echo "</div>";
    echo "<button class='next'><i class='fa-solid fa-chevron-right'></i></button>";
    echo "</div>";
    echo "</div>";
}
?>
