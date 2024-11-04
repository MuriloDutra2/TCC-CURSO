<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

include 'conexao.php';

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Inicializa a consulta SQL
$query = "SELECT * FROM tabela_filme WHERE 1=1";

// Filtros
$grade = isset($_GET['grade']) ? $_GET['grade'] : '';
$year = isset($_GET['year']) ? $_GET['year'] : 'all years';
$genre = isset($_GET['genre']) ? $_GET['genre'] : 'all genres';

// Filtro de classificação
if (!empty($grade)) {
    if ($grade === 'principal') {
        $query .= " AND classificacao = 'principal'";
    } elseif ($grade === 'popular') {
        $query .= " AND classificacao = 'popular'";
    } elseif ($grade === 'novo') {
        $query .= " AND classificacao = 'novo'";
    }
}

// Filtro de ano
if ($year !== 'all years') {
    if ($year == '2024') {
        $query .= " AND ano_filme = '2024'";
    } elseif ($year == '2020-2023') {
        $query .= " AND ano_filme BETWEEN 2020 AND 2023";
    } elseif ($year == '2010-2019') {
        $query .= " AND ano_filme BETWEEN 2010 AND 2019";
    } elseif ($year == '2000-2009') {
        $query .= " AND ano_filme BETWEEN 2000 AND 2009";
    } elseif ($year == '1980-1999') {
        $query .= " AND ano_filme BETWEEN 1980 AND 1999";
    }
}

// Filtro de gênero
if ($genre !== 'all genres') {
    $query .= " AND LOWER(topicos_destaque) LIKE '%" . strtolower($conn->real_escape_string($genre)) . "%'";
}

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $filmes = array();

    while ($row = $result->fetch_assoc()) {
        $filmes[] = $row;
    }

    echo json_encode($filmes);
} else {
    echo json_encode([]);
}

$conn->close();
?>
