<?php
function seletor($genero, $sqlconn)
{
    
    $query = $sqlconn->query("SELECT * FROM conteudos where genero = '$genero'");
    $reg = $query->fetchAll(PDO::FETCH_ASSOC);
    




    echo "<div class='filme-container'>
            <h1 class='genero-txt2'>$genero</h1>
            <div class='wrapper'>
                <button class='prev'><i class='fa-solid fa-chevron-left'></i></button>
                <div class='lista-filme'>";


   
    $i = 0;
    while ($i < count($reg)){
        
                echo"<div class='filme-item'>";
                echo"<img src='img/".$reg[$i]['img_url']."'"."alt='' class='filme-item-img'>";       
                echo"<span class='filme-item-titulo'>".$reg[$i]['titulo']."</span>";        
                echo" <p class='filme-item-descricao'>Dub | Leg</p>";        
                echo"<div class='overlay'>";         
                echo"<span class='overlay-item-titulo'>".$reg[$i]['titulo']."</span>";             
                echo"<p class='overlay-item-linguagem'>Dub | Leg</p>";             
                echo"<p class='overlay-item-descricao'>".$reg[$i]['descricao']."</p>";             
                echo" <a href='login/pg_login.php' class='link-principal'></a>"; 
                echo" <a href='login/pg_login.php' class='link-botao'><i class='fa-solid fa-play botao-play'><div class='play-hover-info'>Reproduzir</div></i></a>";  
                
                          
              
                echo"</div>";         

                echo" </div>";    
                   
        $i++;
    }



    echo "</div>";
    echo "<button class='next'><i class='fa-solid fa-chevron-right'></i></button>";
    echo "</div>";
    echo "</div>";
}
?>
