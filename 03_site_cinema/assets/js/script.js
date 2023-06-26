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

// let imgDashBoard = document.querySelector(`.dashboard-img`);
// let i = 0;
// function changeImg(){
//     i++;
//     imgDashBoard.setAttribute(`src`, `/php_cours/03_site_cinema/assets/img/Blure` + i + `.png`);
//     if(i == 2){
//         i = 0;
//     }
// }

// Badge profil name //

let profilName  = document.querySelector(`.badge`);
if(profilName.innerText == `RedYro` || profilName.innerText == `RedLya`){
    profilName.classList.remove(`bg-secondary`);
    profilName.classList.add(`bg-danger`);
} else if(profilName.innerText == `BlueHada` || profilName.innerText == `BlueYato`){
    profilName.classList.remove(`bg-secondary`);
    profilName.classList.add(`bg-primary`);
} else{
    profilName.classList.add(`bg-secondary`);
}
// Background profil //

let profilMain = document.querySelector(`.profil`);
if(profilName.innerText == `RedYro`){
    profilMain.classList.remove(`profil`);
    profilMain.classList.add(`profil-main-ter`);
} else if(profilName.innerText == `RedLya`){
    profilMain.classList.remove(`profil`);
    profilMain.classList.add(`profil-main`);
} else if(profilName.innerText == `BlueHada`){
    profilMain.classList.remove(`profil`);
    profilMain.classList.add(`profil-main-bis`);
} else if(profilName.innerText == `BlueYato`){
    profilMain.classList.remove(`profil`);
    profilMain.classList.add(`profil-main-4`);
} else{
    profilMain.classList.remove(`profil`);
    profilMain.classList.add(`profil-main-second`);
}

let profilPseudo = document.querySelector(`.profil-name`);
if(profilName.innerText == `RedYro`){
    profilPseudo.classList.remove(`text-secondary`);
    profilPseudo.classList.add(`text-danger`);
} else if(profilName.innerText == `RedLya`){
    profilPseudo.classList.remove(`text-secondary`);
    profilPseudo.classList.add(`text-danger`);
} else if(profilName.innerText == `BlueHada`){
    profilPseudo.classList.remove(`text-secondary`);
    profilPseudo.classList.add(`text-primary`)
} else if(profilName.innerText == `BlueYato`){
    profilPseudo.classList.remove(`text-secondary`);
    profilPseudo.classList.add(`text-primary`)
} else{
    profilPseudo.classList.add(`text-secondary`);
}