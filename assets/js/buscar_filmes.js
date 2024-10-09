/* SISTEMA PARA FILTER BAR */

// Função para capturar as seleções da filter bar e buscar filmes filtrados
function filterMovies() {
    const genre = document.querySelector('.genre').value;
    const year = document.querySelector('.year').value;
    const grade = document.querySelector('input[name="grade"]:checked').id;

    // Montar a URL para buscar os filmes filtrados via AJAX
    const url = `buscar_filmes.php?genre=${encodeURIComponent(genre)}&year=${encodeURIComponent(year)}&grade=${encodeURIComponent(grade)}`;
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            // Exibir os resultados filtrados (substituir o grid de filmes)
            displayFilteredMovies(data);
        })
        .catch(error => console.error('Erro ao buscar filmes filtrados:', error));
}

// Função para exibir os filmes filtrados
function displayFilteredMovies(filmes) {
    const movieGrid = document.querySelector('.movies-grid');
    movieGrid.innerHTML = ''; // Limpar o grid atual

    if (filmes.length === 0) {
        movieGrid.innerHTML = '<p>Nenhum filme encontrado.</p>';
        return;
    }

    // Criar e adicionar os filmes filtrados
    filmes.forEach(filme => {
        const movieCard = document.createElement('div');
        movieCard.classList.add('movie-card');
        movieCard.innerHTML = `
            <img src="${filme.image_path}" alt="${filme.nome_filme}">
            <h3>${filme.nome_filme}</h3>
            <p>${filme.topicos_destaque}</p>
            <p>${filme.ano_filme}</p>
        `;
        movieGrid.appendChild(movieCard);
    });
}

// Adicionar listeners aos filtros
document.querySelector('.genre').addEventListener('change', filterMovies);
document.querySelector('.year').addEventListener('change', filterMovies);
document.querySelectorAll('input[name="grade"]').forEach(radio => {
    radio.addEventListener('change', filterMovies);
});
