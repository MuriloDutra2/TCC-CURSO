<?php
include 'conexao.php';

// Captura o termo pesquisado (ID do filme)
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
$searchQuery = $conn->real_escape_string($searchQuery); // Sanitizar entrada

// Exibe a pesquisa feita para depuração
echo "Você pesquisou pelo ID: " . htmlspecialchars($searchQuery);

// Prepara a consulta SQL para buscar pelo ID do filme
$sql = "SELECT * FROM `tabela_filme` WHERE `id_filme` = '$searchQuery'";

// Executa a consulta
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Pesquisa</title>
    <link rel="stylesheet" href="assets/css/main.css"> <!-- Link para seu CSS -->
</head>
<body>

<div class="container">
    <h1>Resultados para o ID: <?php echo htmlspecialchars($searchQuery); ?></h1>

    <div id="searchResults">
        <?php
        if ($result->num_rows > 0) {
            // Exibe os filmes encontrados
            while ($row = $result->fetch_assoc()) {
                echo "<div class='movie-card'>";
                echo "<h3>" . htmlspecialchars($row['nome_filme']) . "</h3>";
                echo "<p>Ano: " . htmlspecialchars($row['ano_filme']) . "</p>";
                echo "<p>Tópicos: " . htmlspecialchars($row['topicos_destaque']) . "</p>";
                echo "</div>";
            }
        } else {
            // Exibe mensagem se nenhum filme for encontrado
            echo "<p>Não encontramos nenhum filme com esse ID.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>

<?php
// Fecha a conexão
$conn->close();
?>
