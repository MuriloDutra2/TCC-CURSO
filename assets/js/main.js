console.log("JS carregado"); // Certifique-se de que o arquivo está sendo executado

'use strict';

//variaveis para o nabar toggler

const header = document.querySelector('header');
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

//navbar search toggle function

const searchBarIsActive = () => navbarForm.classList.toggle('active');

navbarSearchBtn.addEventListener('click', searchBarIsActive);
navbarFormCloseBtn.addEventListener('click', searchBarIsActive);


/* CODIGO PARA A BARRA DE PESQUISA DO C-STREET */

// Este código redireciona para o index.html com a pesquisa, quando a página atual é uma página de filme
document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita o comportamento padrão do formulário

    console.log('Formulário enviado'); // Verifica se o envio do formulário é interceptado

    // Obtém o valor da barra de pesquisa
    const query = document.getElementById('searchInput').value.trim().toLowerCase();
    
    console.log('Pesquisa por:', query); // Verifica o valor da pesquisa

    // Redireciona para a página principal com a query na URL
    if (query) {
        window.location.href = `index.html?search=${encodeURIComponent(query)}`;
    }
});


/* Função para exibir resultados de pesquisa via AJAX (usada na página principal index.html) */
function displaySearchResults(data) {
    const resultsContainer = document.querySelector('.movies-grid');
    resultsContainer.innerHTML = ''; // Limpa os resultados anteriores

    if (data.length > 0) {
        data.forEach(filme => {
            const movieCard = `
                <div class="movie-card">
                    <div class="card-head">
                        <img src="${filme.image_path}" alt="${filme.nome_filme}" class="card-img">
                        <div class="card-overlay">
                            <div class="bookmark">
                                <ion-icon name="bookmark-outline"></ion-icon>
                            </div>
                            <div class="rating">
                                <ion-icon name="star-outline"></ion-icon>
                                <span>${filme.nota_filme}</span>
                            </div>
                            <div class="play">
                                <ion-icon name="play-circle-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">${filme.nome_filme}</h3>
                        <div class="card-info">
                            <span class="genre">${filme.topicos_destaque}</span>
                            <span class="year">${filme.ano_filme}</span>
                        </div>
                    </div>
                </div>
            `;
            resultsContainer.innerHTML += movieCard;
        });
    } else {
        resultsContainer.innerHTML = '<p>Nenhum filme encontrado</p>';
    }
}
