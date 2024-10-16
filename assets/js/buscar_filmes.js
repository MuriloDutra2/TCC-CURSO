// Função para capturar os valores e buscar filmes filtrados
function filterMovies() {
    const genreElement = document.querySelector('#genre');
    const yearElement = document.querySelector('#year');
    const gradeElement = document.querySelector('input[name="grade"]:checked');

    // Verificar se os elementos existem e capturar seus valores
    const genre = genreElement ? genreElement.value : 'all genres';
    const year = yearElement ? yearElement.value : 'all years';
    const grade = gradeElement ? gradeElement.value : '';

    // Logs para verificar se os valores estão sendo capturados corretamente
    console.log("Gênero Selecionado:", genre);
    console.log("Ano Selecionado:", year);
    console.log("Classificação Selecionada:", grade);

    // Montar a URL para a requisição AJAX
    const url = `buscar_filmes.php?genre=${encodeURIComponent(genre)}&year=${encodeURIComponent(year)}&grade=${encodeURIComponent(grade)}`;

    console.log("URL Fetch:", url);

    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log("Filmes Filtrados:", data); // Verificar os dados recebidos
            // Exibir os resultados filtrados
            displayFilteredMovies(data);
        })
        .catch(error => console.error('Erro ao buscar filmes filtrados:', error));
}
// Função para exibir os filmes filtrados com o CSS aplicado
function displayFilteredMovies(filmes) {
    const movieGrid = document.querySelector('.movies-grid');
    movieGrid.innerHTML = ''; // Limpar o grid atual

    if (filmes.length === 0) {
        movieGrid.innerHTML = '<p>Nenhum filme encontrado.</p>';
        return;
    }

    filmes.forEach(filme => {
        const movieCard = document.createElement('div');
        movieCard.classList.add('movie-card'); // Adicionar a classe movie-card ao elemento

        movieCard.innerHTML = `
            <a href="${filme.url_filme}">
                <div class="card-head">
                    <img src="${filme.image_path}" alt="${filme.nome_filme}" class="card-img"> <!-- Imagem do filme -->
                    <div class="card-overlay">
                        <div class="bookmark">
                            <ion-icon name="bookmark-outline"></ion-icon>
                        </div>
                        <div class="rating">
                            <ion-icon name="star-outline"></ion-icon>
                            <span>${filme.nota_filme}</span> <!-- Nota do filme -->
                        </div>
                        <div class="play">
                            <ion-icon name="play-circle-outline"></ion-icon>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-title">${filme.nome_filme}</h3> <!-- Nome do filme -->
                    <div class="card-info">
                        <span class="genre">${filme.topicos_destaque}</span> <!-- Gênero -->
                        <span class="year">${filme.ano_filme}</span> <!-- Ano -->
                    </div>
                </div>
            </a>
        `;

        movieGrid.appendChild(movieCard); // Adiciona o card ao grid
    });
}


// Adicionar event listeners para gênero, ano e classificação
document.querySelector('#genre').addEventListener('change', filterMovies);
document.querySelector('#year').addEventListener('change', filterMovies);
document.querySelectorAll('input[name="grade"]').forEach(radio => {
    radio.addEventListener('change', filterMovies);
});
