// Função para exibir a tela de carregamento
function showLoadingScreen() {
    let loadingScreen = document.getElementById('loadingScreen');
    let content = document.getElementById('content');
    
    // Exibe a tela de carregamento e esconde o conteúdo
    loadingScreen.style.display = 'flex';
    content.style.display = 'none';
}

// Função para esconder a tela de carregamento e mostrar o conteúdo
function hideLoadingScreen() {
    let loadingScreen = document.getElementById('loadingScreen');
    let content = document.getElementById('content');
    
    // Esconde a tela de carregamento e exibe o conteúdo
    setTimeout(() => {
        loadingScreen.style.display = 'none';
        content.style.display = 'block';
    }, 1000); // Agora a tela de carregamento ficará visível por 1 segundo
}

// Controla o comportamento de navegação com setas do navegador
window.addEventListener('popstate', function() {
    if (sessionStorage.getItem('loadingInProgress') === 'true') {
        showLoadingScreen();
        setTimeout(hideLoadingScreen, 1000); // Após 1 segundo, a tela de carregamento desaparece
    } else {
        hideLoadingScreen();
    }
});

// Quando a página for carregada, esconder o carregamento e mostrar o conteúdo
window.addEventListener('load', function() {
    sessionStorage.setItem('loadingInProgress', 'true'); // Marca que o carregamento está em progresso
    hideLoadingScreen();
    sessionStorage.setItem('loadingInProgress', 'false'); // Marca que o carregamento terminou
});

// Mostrar a tela de carregamento assim que a navegação começar (ao clicar nos links)
document.addEventListener("DOMContentLoaded", function() {
    if (!sessionStorage.getItem('loadingInProgress') || sessionStorage.getItem('loadingInProgress') === 'false') {
        showLoadingScreen();
        setTimeout(hideLoadingScreen, 1000); // Após 1 segundo, a tela de carregamento desaparece
    }
});


const menu = document.querySelector(".generos_nav");
const botaoNavegar = document.querySelector(".navegar");
const overlay = document.getElementById("overlay2");

menu.style.transition = "0.2s ease all";
menu.style.overflow = "hidden";
menu.style.maxHeight = "0px";

botaoNavegar.addEventListener("click", () => {
    if (menu.style.maxHeight == "0px") {
        menu.style.maxHeight = "200px";
        overlay.style.display = "block";
    } else {
        menu.style.maxHeight = "0px";
        overlay.style.display = "none";
    }
});

document.addEventListener("click", () => {
    if (!menu.contains(event.target) && !botaoNavegar.contains(event.target)) {
        menu.style.maxHeight = "0px";
        overlay.style.display = "none";
    }
});


/* Usuario */

const overlay2 = document.getElementById("overlay3")
const perfilMenu = document.querySelector(".perfil-nav");
const botaoUsuario = document.querySelector(".usuario");

perfilMenu.style.transition = "0.2s ease all";
perfilMenu.style.overflow = "hidden";
perfilMenu.style.maxHeight = "0px";

botaoUsuario.addEventListener("click", () => {
    if (perfilMenu.style.maxHeight == "0px") {
        perfilMenu.style.maxHeight = "290px";
        overlay2.style.display = "block";

    } else {
        perfilMenu.style.maxHeight = "0px";
        overlay2.style.display = "none";
    }
});

document.addEventListener("click", () => {
    if (!perfilMenu.contains(event.target) && !botaoUsuario.contains(event.target)) {
        perfilMenu.style.maxHeight = "0px";
        overlay2.style.display = "none";

    }
});


const prevButtons = document.querySelectorAll(".prev");  
const nextButtons = document.querySelectorAll(".next");  
const movieLists = document.querySelectorAll(".lista-filme");  

const moveDistance = 750;  

// Botão da direita (Avançar)
nextButtons.forEach((button, i) => {
    button.addEventListener("click", () => {
        const movieItems = movieLists[i];  
        const currentTransform = parseInt(movieItems.style.transform.replace("translateX(", "").replace("px)", "")) || 0;

        const maxTranslation = -(movieItems.scrollWidth - movieItems.clientWidth);  

       
        if (currentTransform > maxTranslation) {
            movieItems.style.transition = "transform 0.5s ease";  
            movieItems.style.transform = `translateX(${currentTransform - moveDistance}px)`;  
        }
    });
});


prevButtons.forEach((button, i) => {
    button.addEventListener("click", () => {
        const movieItems = movieLists[i];  
        const currentTransform = parseInt(movieItems.style.transform.replace("translateX(", "").replace("px)", "")) || 0;

       
        if (currentTransform < 0) {
            movieItems.style.transition = "transform 0.5s ease"; 
            movieItems.style.transform = `translateX(${currentTransform + moveDistance}px)`;
        }
    });
});


// Seleciona os botões
const botaoLike = document.querySelectorAll('.botao-like');
const botaoDeslike = document.querySelectorAll('.botao-deslike');

// Função para alternar o estado de like e deslike
botaoLike.forEach(button => {
    button.addEventListener('click', function() {
        
        // Alterna a classe 'blue' do like
        this.classList.toggle('blue');
        
        // Caso o like seja marcado, remove a marcação do deslike
        if (this.classList.contains('blue')) {
            botaoDeslike.forEach(deslike => {
                deslike.classList.remove('blue');
            });
        }
    });
});

botaoDeslike.forEach(button => {
    button.addEventListener('click', function() {
        
        // Alterna a classe 'blue' do deslike
        this.classList.toggle('blue');
        
        // Caso o deslike seja marcado, remove a marcação do like
        if (this.classList.contains('blue')) {
            botaoLike.forEach(like => {
                like.classList.remove('blue');
            });
        }
    });
});

document.getElementById("nome").addEventListener("input", function () {
    this.value = this.value.replace(/[0-9]/g, ""); // Remove qualquer número digitado
});

