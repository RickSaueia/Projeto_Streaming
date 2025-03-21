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


function formatCPF(input) {
    // Remove todos os caracteres que não sejam números
    let value = input.value.replace(/\D/g, '');
   
    // Aplica a máscara do CPF
    if (value.length <= 3) {
        input.value = value;
    } else if (value.length <= 6) {
        input.value = value.replace(/(\d{3})(\d+)/, '$1.$2');
    } else if (value.length <= 9) {
        input.value = value.replace(/(\d{3})(\d{3})(\d+)/, '$1.$2.$3');
    } else {
        input.value = value.replace(/(\d{3})(\d{3})(\d{3})(\d+)/, '$1.$2.$3-$4');
    }
}

document.getElementById("nome").addEventListener("input", function () {
    this.value = this.value.replace(/[0-9]/g, ""); // Remove qualquer número digitado
});



function validarEmail(input) {
    // Define os domínios permitidos
    const dominiosPermitidos = ["gmail.com", "hotmail.com", "outlook.com"];
    const email = input.value.trim();
    const parts = email.split("@");

    // Verifica se o e-mail possui "@" e domínio permitido
    if (parts.length === 2 && dominiosPermitidos.includes(parts[1]) && parts[0].length > 0) {
        input.setCustomValidity(""); // Limpa mensagens de erro
    } else {
        input.setCustomValidity("Digite um e-mail válido. Ex: teste@gmail.com");
    }
}