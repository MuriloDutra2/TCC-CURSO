<?php
include 'conexao.php'; // Certifique-se de que a conexão com o banco está incluída

if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Faz a busca no banco de dados pelo nome do filme ou pelo ID
    $query = $conn->prepare("SELECT * FROM tabela_filme WHERE nome_filme LIKE ? OR id_filme = ?");
    $like_search = "%" . $search . "%";
    $query->bind_param("si", $like_search, $search);
    $query->execute();
    $result = $query->get_result();

    echo "<h2>Resultados para: " . htmlspecialchars($search) . "</h2>";

    if ($result->num_rows > 0) {
        // Exibe os resultados encontrados
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . $row['nome_filme'] . " (" . $row['ano_filme'] . ") - " . $row['topicos_destaque'] . "</p>";
        }
    } else {
        echo "<p>Nenhum filme encontrado</p>";
    }
}
?>
