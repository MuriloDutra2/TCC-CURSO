<?php
// Conexão com o banco de dados
include 'conexao.php'; // Este arquivo contém a conexão

// Captura o termo pesquisado
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Consulta à tabela de filmes
$sql = "SELECT * FROM `tabela_filme` WHERE `nome_filme` LIKE '%$searchQuery%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Pesquisa</title>
</head>
<body>

    <h1>Resultados para: <?php echo htmlspecialchars($searchQuery); ?></h1>

    <div id="searchResults">
        <?php
        if ($result->num_rows > 0) {
            // Exibe cada filme encontrado
            while ($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<h2>" . htmlspecialchars($row['nome_filme']) . "</h2>";
                echo "<p>Ano: " . htmlspecialchars($row['ano_filme']) . "</p>";
                echo "<p>Tópicos: " . htmlspecialchars($row['topicos_destaque']) . "</p>";
                echo "</div>";
            }
        } else {
            // Exibe mensagem se nenhum filme for encontrado
            echo "<p>Não encontramos nada.</p>";
        }
        ?>
    </div>

</body>
</html>

<?php
// Fechar conexão
$conn->close();
?>
