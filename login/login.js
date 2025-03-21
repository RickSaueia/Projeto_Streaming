
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

window.onload = function() {
    document.querySelectorAll("input").forEach(input => {
        input.setAttribute("autocomplete", "off");
        input.setAttribute("readonly", "true"); 
        setTimeout(() => input.removeAttribute("readonly"), 100); 
    });
};
