'use strict';

//variaveis para o nabar toggler

const header = document.querySelector('HEader');
const nav = document.querySelector('nav');
const navbarMenuBtn = document.querySelector('.navbar-menu-btn');

//variaveis para o toggle do navbar
const navbarForm = document.querySelector('.navbar-form');
const navbarFormCloseBtn = document.querySelector('.navbar-form-close');
const navbarSearchBtn = document.querySelector('.navbar-search-btn');

//navbar menu toggle function
function navIsActive() {
    header.classList.toggle('active');
    nav.classList.toggle('active');
    navbarMenuBtn.classList.toggle('active');
}

navbarMenuBtn.addEventListener('click', navIsActive);


//navbar search toggle fucntion

const searchBarIsActive = () => navbarForm.classList.toggle('active');

navbarSearchBtn.addEventListener('click', searchBarIsActive);
navbarFormCloseBtn.addEventListener('click', searchBarIsActive);

document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Impede o comportamento padrão do formulário

    // Pega o valor pesquisado
    const query = document.getElementById('searchInput').value.trim().toLowerCase();

    // Se houver algo digitado, redireciona para a página resultado.html
    if (query) {
        window.location.href = `resultados.html?search=${encodeURIComponent(query)}`;
    }
});
