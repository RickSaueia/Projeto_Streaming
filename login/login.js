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

window.onload = function() {
    document.querySelectorAll("input").forEach(input => {
        input.setAttribute("autocomplete", "off");
        input.setAttribute("readonly", "true"); // Bloqueia o autocomplete
        setTimeout(() => input.removeAttribute("readonly"), 100); // Reativa após 100ms
    });
};
