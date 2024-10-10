/* SISTEMA PARA FILTRAR FILMES POR ANO E CLASSIFICAÇÃO */

// Função para aplicar filtros de ano e classificação
/* SISTEMA PARA FILTRAR FILMES POR ANO E CLASSIFICAÇÃO */

// Função para capturar as seleções da filter bar e buscar filmes filtrados
function filterMovies() {
    const genreElement = document.querySelector('.genre');
    const yearElement = document.querySelector('.year');
    const gradeElement = document.querySelector('input[name="grade"]:checked');

    // Verificar se os elementos existem e têm valores válidos
    const genre = genreElement ? genreElement.value : 'all genres';
    const year = yearElement ? yearElement.value : 'all years';
    const grade = gradeElement ? gradeElement.id : ''; // Se não houver classificação selecionada, deixe vazio

    // Montar a URL para buscar os filmes filtrados via AJAX
    let url = `buscar_filmes.php?year=${encodeURIComponent(year)}`;

    // Só adicionar classificação se houver seleção
    if (grade) {
        url += `&grade=${encodeURIComponent(grade)}`;
    }

    // Fazer a requisição para buscar os filmes filtrados
    fetch(url)
        .then(response => response.json())
        .then(data => {
            // Exibir os resultados filtrados (substituir o grid de filmes)
            displayFilteredMovies(data);
        })
        .catch(error => console.error('Erro ao buscar filmes filtrados:', error));
}

// Adicionar listeners aos filtros
document.querySelector('.year').addEventListener('change', filterMovies); // Listener para o ano
document.querySelectorAll('input[name="grade"]').forEach(radio => {
    radio.addEventListener('change', filterMovies); // Listener para a classificação
});

// Função para exibir os filmes filtrados
// Função para exibir os filmes filtrados
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
            <a href="${filme.url_filme}">
                <img src="${filme.image_path}" alt="${filme.nome_filme}" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">${filme.nome_filme}</h3>
                    <p>${filme.topicos_destaque}</p>
                    <p>${filme.ano_filme}</p>
                </div>
            </a>
        `;
        movieGrid.appendChild(movieCard);
    });
}

