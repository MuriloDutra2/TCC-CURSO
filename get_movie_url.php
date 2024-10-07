<?php
// Conectar ao banco de dados
include('conexao.php'); // Seu arquivo de conexão

if (isset($_POST['id_filme'])) {
    $id_filme = intval($_POST['id_filme']);

    // Consulta SQL para buscar a URL do filme
    $query = "SELECT url_filmes FROM sua_tabela_filmes WHERE id_filme = $id_filme";
    $result = mysqli_query($conexao, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['url_filmes']; // Retorna a URL
    } else {
        echo "URL não encontrada";
    }
} else {
    echo "ID do filme não fornecido";
}
?>
