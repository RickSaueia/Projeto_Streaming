
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


window.addEventListener('popstate', function () {
    if (sessionStorage.getItem('loadingInProgress') === 'true') {
        showLoadingScreen();
        setTimeout(hideLoadingScreen, 1000); 
    } else {
        hideLoadingScreen();
    }
});


window.addEventListener('load', function () {
    sessionStorage.setItem('loadingInProgress', 'true'); 
    hideLoadingScreen();
    sessionStorage.setItem('loadingInProgress', 'false'); 
});


document.addEventListener("DOMContentLoaded", function () {
    if (!sessionStorage.getItem('loadingInProgress') || sessionStorage.getItem('loadingInProgress') === 'false') {
        showLoadingScreen();
        setTimeout(hideLoadingScreen, 1000); 
    }
});

window.onload = function () {
    document.querySelectorAll("input").forEach(input => {
        input.setAttribute("autocomplete", "off");
        input.setAttribute("readonly", "true"); 
        setTimeout(() => input.removeAttribute("readonly"), 100); 
    });
};



function permitirApenasNumerosInteiros(event) {
    
    const inputValue = event.target.value;
    event.target.value = inputValue.replace(/[^0-9]/g, ''); 
}


function formatarValidade(event) {
    let valor = event.target.value.replace(/\D/g, ''); 

    if (valor.length === 0) {
        event.target.value = ''; 
        return;
    }

    if (valor.length > 4) {
        valor = valor.substring(0, 4);
    }

    let mes = valor.substring(0, 2);
    let ano = valor.substring(2, 4);

    
    if (mes.length === 2) {
        mes = Math.min(Math.max(parseInt(mes, 10), 1), 12).toString().padStart(2, '0');
    }

   
    if (valor.length <= 2) {
        event.target.value = mes;
        return;
    }

   
    if (ano.length === 2) {
        let anoInt = parseInt(ano, 10);
        if (anoInt < 25) {
            ano = '25'; 
        } else if (anoInt > 29) {
            ano = '29'; 
        }
    }

   
    event.target.value = mes + (ano ? '/' + ano : '');
}

function formatarnumero_cartao(event) {
    let valor = event.target.value.replace(/\D/g, ''); 
    
    valor = valor.replace(/(.{4})(?=.)/g, '$1 ');
    event.target.value = valor; 
}

function permitirApenasNumerosInteiros(event) {
    
    const inputValue = event.target.value;
    event.target.value = inputValue.replace(/[^0-9]/g, ''); 
}
