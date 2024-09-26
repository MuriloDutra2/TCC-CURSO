<?php
include 'conexao.php'; // Inclua sua conexão ao banco

// Verifica se há uma pesquisa
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];

    // Verifica a conexão com o banco de dados
    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Modifique a query para buscar o ID do filme
    $sql = "SELECT * FROM tabela_filme WHERE id_filme = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $searchQuery); // Usa "s" para strings

    // Executa a consulta
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        // Exibe os resultados
        while ($row = $result->fetch_assoc()) {
            echo "<p>Filme: " . $row['nome_filme'] . " (" . $row['ano_filme'] . ")</p>";
        }
    } else {
        echo "Nenhum filme encontrado.";
    }

    // Fecha a conexão
    $stmt->close();
    $conn->close();
} else {
    echo "Nenhum termo de pesquisa foi fornecido.";
}
?>
