<?php
// Conexão com o banco de dados
include 'conexao.php';

$genre = $_GET['genre'] ?? 'all genres';
$year = $_GET['year'] ?? 'all years';
$grade = $_GET['grade'] ?? 'featured';

// Construir a query SQL
$sql = "SELECT * FROM filmes WHERE 1=1"; // Base da query

if ($genre != 'all genres') {
    $sql .= " AND categoria = '$genre'";
}

if ($year != 'all years') {
    // Ajustar o intervalo de anos com base na seleção
    if ($year == '2020-2023') {
        $sql .= " AND ano BETWEEN 2020 AND 2023";
    } elseif ($year == '2010-2019') {
        $sql .= " AND ano BETWEEN 2010 AND 2019";
    } // E assim por diante...
}

if ($grade == 'popular') {
    $sql .= " AND classificacao = 'popular'";
} elseif ($grade == 'newest') {
    $sql .= " AND classificacao = 'novo'";
}

// Executar a query
$result = $conn->query($sql);
$filmes = $result->fetch_all(MYSQLI_ASSOC);

// Retornar os filmes em formato JSON
header('Content-Type: application/json');
echo json_encode($filmes);
?>
