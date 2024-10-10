/* FILTRO PARA CLASSIFICAÇÃO */

function filterMovies() {
    const gradeElement = document.querySelector('input[name="grade"]:checked');
    const grade = gradeElement ? gradeElement.id : 'featured'; // Padrão para 'principal'

    // Montar a URL para buscar os filmes filtrados via AJAX
    const url = `buscar_filmes.php?grade=${encodeURIComponent(grade)}`;
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            // Exibir os resultados filtrados (substituir o grid de filmes)
            displayFilteredMovies(data);
        })
        .catch(error => console.error('Erro ao buscar filmes filtrados:', error));
}

// Função para exibir os filmes filtrados com as classes de estilo do index.html
function displayFilteredMovies(filmes) {
    const movieGrid = document.querySelector('.movies-grid');
    movieGrid.innerHTML = ''; // Limpar o grid atual

    if (filmes.length === 0) {
        movieGrid.innerHTML = '<p>Nenhum filme encontrado.</p>';
        return;
    }

    // Criar e adicionar os filmes filtrados com a estrutura e classes de CSS
    filmes.forEach(filme => {
        const movieCard = document.createElement('div');
        movieCard.classList.add('movie-card'); // Classe movie-card

        movieCard.innerHTML = `
            <div class="card-head">
                <a href="${filme.url_filme}">
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
                </a>
            </div>
            <div class="card-body">
                <h3 class="card-title">${filme.nome_filme}</h3>
                <div class="card-info">
                    <span class="genre">${filme.topicos_destaque}</span>
                    <span class="year">${filme.ano_filme}</span>
                </div>
            </div>
        `;
        movieGrid.appendChild(movieCard);
    });
}

// Adicionar listeners ao filtro de classificação
document.querySelectorAll('input[name="grade"]').forEach(radio => {
    radio.addEventListener('change', filterMovies);
});
