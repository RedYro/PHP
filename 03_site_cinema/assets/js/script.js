// sidebarre dashboard active class //   /!\ confilt avec la deuxième active class /!\

let links = document.querySelectorAll(`.sidebarre a`);
let activePage = window.location.href; // Récupère, définit l'emplacement ou l'URL en cours de l'objet de fenêtre
for (let i = 0; i < links.length; i++){
    if(activePage.includes(links[i].href)){
        links[i].classList.add(`sidebarre-active`);
    }
}

// header active class //   /!\ confilt avec la première active class /!\

let linksHeader = document.querySelectorAll(`.nav-item a`);
for (let i = 0; i < linksHeader.length; i++){
    if(activePage.includes(linksHeader[i].href)){
        linksHeader[i].classList.add(`header-active`);
    }
}

// function show password inscription //

let showPassword = document.querySelector(`#mdp`);
let showPasswordConfirm = document.querySelector(`#confirmMdp`);
function mdpInscription(){
    if(showPassword.type === `password` && showPasswordConfirm.type === `password`){
        showPassword.type = `text`;
        showPasswordConfirm.type = `text`;
    } else{
        showPassword.type = `password`;
        showPasswordConfirm.type = `password`;
    }
}

// function show password log in //

let showPasswordLog = document.querySelector(`#password`);
function showPasswordLogIn(){
    if(showPasswordLog.type === `password`){
        showPasswordLog.type = `text`;
    } else{
        showPasswordLog.type = `password`;
    }
}

// img dashboard swap / change //

let imgDashBoard = document.querySelector(`.dashboard-img`);
let i = 0;
function changeImg(){
    i++;
    imgDashBoard.setAttribute(`src`, `/php_cours/03_site_cinema/assets/img/Blure` + i + `.png`);
    if(i == 2){
        i = 0;
    }
}