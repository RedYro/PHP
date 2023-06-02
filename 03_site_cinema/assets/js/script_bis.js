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

let imgDashBoard = document.querySelector(`.dashboard-img`);
let i = 0;
function changeImg(){
    i++;
    imgDashBoard.setAttribute(`src`, `/php_cours/03_site_cinema/assets/img/Blure` + i + `.png`);
    if(i == 2){
        i = 0;
    }
}