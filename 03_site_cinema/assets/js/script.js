let links = document.querySelectorAll(`.sidebarre a`);

let activePage = window.location.href;
for (let i = 0; i < links.length; i++){
    if(activePage.includes(links[i].href)){
        links[i].classList.add(`sidebarre-active`);
    }
}