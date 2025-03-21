
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
    }, 1000); o
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

window.onload = function() {
    document.querySelectorAll("input").forEach(input => {
        input.setAttribute("autocomplete", "off");
        input.setAttribute("readonly", "true"); 
        setTimeout(() => input.removeAttribute("readonly"), 100); 
    });
};


function formatCPF(input) {
    
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
    this.value = this.value.replace(/[0-9]/g, ""); 
});



function validarEmail(input) {
    
    const dominiosPermitidos = ["gmail.com", "hotmail.com", "outlook.com"];
    const email = input.value.trim();
    const parts = email.split("@");

   
    if (parts.length === 2 && dominiosPermitidos.includes(parts[1]) && parts[0].length > 0) {
        input.setCustomValidity("");
    } else {
        input.setCustomValidity("Digite um e-mail válido. Ex: teste@gmail.com");
    }
}