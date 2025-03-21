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
window.addEventListener('popstate', function () {
    if (sessionStorage.getItem('loadingInProgress') === 'true') {
        showLoadingScreen();
        setTimeout(hideLoadingScreen, 1000); // Após 1 segundo, a tela de carregamento desaparece
    } else {
        hideLoadingScreen();
    }
});

// Quando a página for carregada, esconder o carregamento e mostrar o conteúdo
window.addEventListener('load', function () {
    sessionStorage.setItem('loadingInProgress', 'true'); // Marca que o carregamento está em progresso
    hideLoadingScreen();
    sessionStorage.setItem('loadingInProgress', 'false'); // Marca que o carregamento terminou
});

// Mostrar a tela de carregamento assim que a navegação começar (ao clicar nos links)
document.addEventListener("DOMContentLoaded", function () {
    if (!sessionStorage.getItem('loadingInProgress') || sessionStorage.getItem('loadingInProgress') === 'false') {
        showLoadingScreen();
        setTimeout(hideLoadingScreen, 1000); // Após 1 segundo, a tela de carregamento desaparece
    }
});

window.onload = function () {
    document.querySelectorAll("input").forEach(input => {
        input.setAttribute("autocomplete", "off");
        input.setAttribute("readonly", "true"); // Bloqueia o autocomplete
        setTimeout(() => input.removeAttribute("readonly"), 100); // Reativa após 100ms
    });
};



function permitirApenasNumerosInteiros(event) {
    // Permite apenas números e impede a inserção de caracteres não numéricos
    const inputValue = event.target.value;
    event.target.value = inputValue.replace(/[^0-9]/g, ''); // Remove tudo que não for número
}

// Função para formatar a validade como MM/AA
function formatarValidade(event) {
    let valor = event.target.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (valor.length === 0) {
        event.target.value = ''; // Permite que o usuário apague tudo
        return;
    }

    if (valor.length > 4) {
        valor = valor.substring(0, 4);
    }

    let mes = valor.substring(0, 2);
    let ano = valor.substring(2, 4);

    // Validação do mês
    if (mes.length === 2) {
        mes = Math.min(Math.max(parseInt(mes, 10), 1), 12).toString().padStart(2, '0');
    }

    // Se o usuário apagou parte do valor, não força a formatação
    if (valor.length <= 2) {
        event.target.value = mes;
        return;
    }

    // Validação do ano
    if (ano.length === 2) {
        let anoInt = parseInt(ano, 10);
        if (anoInt < 25) {
            ano = '25'; // Define o mínimo como 2025
        } else if (anoInt > 29) {
            ano = '29'; // Define o máximo como 2029
        }
    }

    // Atualiza o campo com o formato MM/YY
    event.target.value = mes + (ano ? '/' + ano : '');
}

function formatarnumero_cartao(event) {
    let valor = event.target.value.replace(/\D/g, ''); // Remove qualquer caractere não numérico
    // Divide o valor em grupos de 4 dígitos e adiciona um espaço entre eles
    valor = valor.replace(/(.{4})(?=.)/g, '$1 ');
    event.target.value = valor; // Atualiza o valor do campo com a formatação
}

function permitirApenasNumerosInteiros(event) {
    // Permite apenas números e impede a inserção de caracteres não numéricos
    const inputValue = event.target.value;
    event.target.value = inputValue.replace(/[^0-9]/g, ''); // Remove tudo que não for número
}
