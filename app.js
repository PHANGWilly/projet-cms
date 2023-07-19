/* 
 * MENU ITEMS HEADER EN BLANC
*/
const menuItems = document.querySelectorAll('#site-header .menu-item a');

menuItems.forEach(function(menuItem) {
    menuItem.classList.add('menu-item-link', 'fs-3');
});


const menuItemsFooter = document.querySelectorAll('#menu-footer-menu .menu-item a');

menuItemsFooter.forEach(function(menuItem) {
    menuItem.classList.add('menu-item-footer-link', 'fs-6');
});

/* 
 *GESTION DE L'AFFICHAGE DU MENU
*/
const customMenuLinkLogo = document.querySelector('.custom-logo-link');
const logoOpen = document.getElementById("logo-open");
const navigationButton = document.getElementById("navigation-button");
const menuContainer = document.getElementById("menu-container");
const siteHeader = document.getElementById("site-header");
const menuButtonOpen = document.getElementById("menu-button-open");
const menuButtonClose = document.getElementById("menu-button-close");

navigationButton.addEventListener('click', function() {
    if (menuContainer.classList.contains('d-none')) {
        /*Quand c'est pas afficher */
        menuContainer.classList.remove('d-none');
        menuContainer.classList.add('d-block');

    } else if(menuContainer.classList.contains('d-block')){
        /*Quand c'est afficher */
        menuContainer.classList.remove('d-block');
        menuContainer.classList.add('d-none');
    }

    siteHeader.classList.toggle("open");
});

// Fonction pour basculer entre les états ouvert et fermé du menu
function toggleMenu() {
    // Vérifier si le menu est actuellement ouvert
    var isMenuOpen = menuContainer.classList.contains("d-block");

    // Basculer la visibilité du menu
    if (isMenuOpen) {
        menuContainer.classList.remove("d-none");
        menuContainer.classList.add("d-block");
        logoOpen.classList.remove("d-none");
        logoOpen.classList.add("d-block");
        customMenuLinkLogo.classList.remove("d-block");
        customMenuLinkLogo.classList.add("d-none");
    } else {
        menuContainer.classList.remove("d-block");
        menuContainer.classList.add("d-none");
        logoOpen.classList.remove("d-block");
        logoOpen.classList.add("d-none");
        customMenuLinkLogo.classList.remove("d-none");
        customMenuLinkLogo.classList.add("d-block");
    }

    // Basculer l'affichage des boutons SVG
    menuButtonOpen.classList.toggle("d-none");
    menuButtonClose.classList.toggle("d-none");
}

// Ajouter un gestionnaire d'événement de clic au bouton
document.getElementById("navigation-button").addEventListener("click", toggleMenu);

const body = document.body;
const main = document.getElementById("main");
if(body.classList.contains('error404')){
    body.classList.add('text-white', 'bg-primary');
    main.classList.add('d-flex', 'align-items-center')
}