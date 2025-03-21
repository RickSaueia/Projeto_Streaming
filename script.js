
function showLoadingScreen() {
    let loadingScreen = document.getElementById('loadingScreen');
    let content = document.getElementById('content');
    
  
    loadingScreen.style.display = 'flex';
    content.style.display = 'none';
}


function hideLoadingScreen() {
    let loadingScreen = document.getElementById('loadingScreen');
    let content = document.getElementById('content');
    
   
    setTimeout(() => {
        loadingScreen.style.display = 'none';
        content.style.display = 'block';
    }, 1000); 
}


window.addEventListener('popstate', function() {
    if (sessionStorage.getItem('loadingInProgress') === 'true') {
        showLoadingScreen();
        setTimeout(hideLoadingScreen, 1000); 
    } else {
        hideLoadingScreen();
    }
});


window.addEventListener('load', function() {
    sessionStorage.setItem('loadingInProgress', 'true'); 
    hideLoadingScreen();
    sessionStorage.setItem('loadingInProgress', 'false'); 
});


document.addEventListener("DOMContentLoaded", function() {
    if (!sessionStorage.getItem('loadingInProgress') || sessionStorage.getItem('loadingInProgress') === 'false') {
        showLoadingScreen();
        setTimeout(hideLoadingScreen, 1000); 
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



const botaoLike = document.querySelectorAll('.botao-like');
const botaoDeslike = document.querySelectorAll('.botao-deslike');


botaoLike.forEach(button => {
    button.addEventListener('click', function() {
        
        
        this.classList.toggle('blue');
        
        
        if (this.classList.contains('blue')) {
            botaoDeslike.forEach(deslike => {
                deslike.classList.remove('blue');
            });
        }
    });
});

botaoDeslike.forEach(button => {
    button.addEventListener('click', function() {
        
       
        this.classList.toggle('blue');
        
        
        if (this.classList.contains('blue')) {
            botaoLike.forEach(like => {
                like.classList.remove('blue');
            });
        }
    });
});


