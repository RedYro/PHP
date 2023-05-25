let links = document.querySelectorAll(`.sidebarre a`);

let activePage = window.location.href; // Récupère, définit l'emplacement ou l'URL en cours de l'objet de fenêtre
for (let i = 0; i < links.length; i++){
    if(activePage.includes(links[i].href)){
        links[i].classList.add(`sidebarre-active`);
    }
}