// function show password //

let showPassword = document.querySelector(`#mdp`);
let showPasswordConfirm = document.querySelector(`#confirmMdp`);
function myFunction(){
    if(showPassword.type === `password` && showPasswordConfirm.type === `password`){
        showPassword.type = `text`;
        showPasswordConfirm.type = `text`;
    } else{
        showPassword.type = `password`;
        showPasswordConfirm.type = `password`;
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

// header active class //

let linksHeader = document.querySelectorAll(`.nav-item > a`);
let activePageHeader = window.location.href;
for (let i = 0; i < linksHeader.length; i++){
    if(activePageHeader.includes(linksHeader[i].href)){
        linksHeader[i].classList.add(`header-active`);
    }
}
