// Filmes disponíveis (pode ser gerado dinamicamente em outro cenário)
const movies = [
    { title: "Ação", category: "action" },
    { title: "Aventura", category: "adventure" },
    { title: "Terror", category: "horror" },
    { title: "Animação", category: "animation" },
    { title: "Suspense", category: "thriller" },
    { title: "Comédia", category: "comedy" },
    { title: "Drama", category: "drama" },
    { title: "Crime", category: "crime" },
    { title: "Documentário", category: "documentary" }
  ];

  // Manipular o envio do formulário
  document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Impede o comportamento padrão do formulário

    // Pega o valor pesquisado
    const query = document.getElementById('searchInput').value.toLowerCase();

    // Filtra filmes com base na pesquisa
    const filteredMovies = movies.filter(movie => movie.title.toLowerCase().includes(query));

    // Limpa a área de resultados
    const resultsContainer = document.getElementById('searchResults');
    resultsContainer.innerHTML = '';

    // Verifica se algum filme foi encontrado
    if (filteredMovies.length > 0) {
      // Exibe os filmes encontrados
      filteredMovies.forEach(movie => {
        const movieElement = document.createElement('div');
        movieElement.textContent = movie.title;
        resultsContainer.appendChild(movieElement);
      });
    } else {
      // Exibe uma mensagem de erro se nenhum filme foi encontrado
      resultsContainer.innerHTML = '<p>Não encontramos nada.</p>';
    }
  });