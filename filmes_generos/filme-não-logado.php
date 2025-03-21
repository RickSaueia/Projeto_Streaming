<?php
function seletor($genero, $sqlconn)
{
    
    $query = $sqlconn->query("SELECT * FROM conteudos where genero = '$genero'");
    $reg = $query->fetchAll(PDO::FETCH_ASSOC);
    




    echo "<div class='filme-container'>
            <h1 class='genero-txt2'>Animes de $genero</h1>
            <div class='wrapper'>
                
                <div class='lista-filme'>";


    //lista de filmes
    $i = 0;
    while ($i < count($reg)){
        
                echo"<div class='filme-item'>";
                echo"<img src='../../img/".$reg[$i]['img_url']."'"."alt='' class='filme-item-img'>";       
                echo"<span class='filme-item-titulo'>".$reg[$i]['titulo']."</span>";        
                echo" <p class='filme-item-descricao'>Dub | Leg</p>";        
                echo"<div class='overlay'>";         
                echo"<span class='overlay-item-titulo'>".$reg[$i]['titulo']."</span>";             
                echo"<p class='overlay-item-linguagem'>Dub | Leg</p>";             
                echo"<p class='overlay-item-descricao'>".$reg[$i]['descricao']."</p>";             
                echo" <a href='../../login/pg_login.php' class='link-principal'></a>"; 
                echo" <a href='../../login/pg_login.php' class='link-botao'><i class='fa-solid fa-play botao-play'><div class='play-hover-info'>Reproduzir</div></i></a>";  
                echo"<i class='fa-solid fa-thumbs-up botao-like'><div class='like-hover-info'>Marcar como gostei</div></i>";
                echo"<i class='fa-solid fa-thumbs-down botao-deslike'><div class='deslike-hover-info'>Marcar como não gostei</div></i>";
                          
              
                echo"</div>";         

                echo" </div>";    
                   
        $i++;
    }



    echo "</div>";
    
    echo "</div>";
    echo "</div>";
}
?>
